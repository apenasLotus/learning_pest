<?php

namespace LearningPest\Service;

use LearningPest\Models\Users\ModelUser;
use LearningPest\Models\Rent\ModelCar;

class LocatorService
{
  private array $rent;

  public function __construct()
  {
  }

  public function createRent(ModelCar $car): void
  {
    isset($this->rent) ? $this->checkRentalStatus($car->getUser()) : null;

    $userName = $car->getUser()
      ->name();

    $this->rent[] = $car;
  }

  public function getRents(): array
  {
    return $this->rent;
  }

  private function checkRentalStatus(ModelUser $user)
  {
    foreach ($this->rent as $key => $modelCar) {

      if ($modelCar->getUser()->name() == $user->name())
        $modelCar->isAlreadyRented() ? throw new \Exception("Já possui uma locação ativa", 409) : '';
    }
  }
}
