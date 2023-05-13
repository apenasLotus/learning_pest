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

  public function createRent(ModelCar $car, ModelUser $user): void
  {
    isset($this->rent) ? $this->checkRentalStatus($user) : null;

    $this->rent[$user->name()] = $car;
  }

  public function getRents(): array
  {
    return $this->rent;
  }

  private function checkRentalStatus(ModelUser $user)
  {
    if ($this->rent[$user->name()])
      $this->rent[$user->name()]->isAlreadyRented() ? throw new \Exception("Já possui uma locação ativa", 409) : '';
  }
}
