<?php

namespace LearningPest\Models\Rent;

use LearningPest\Models\Users\ModelUser;

class ModelCar extends AbstractRent
{
  private string $name;
  private float $value;
  private bool $alreadyRented;
  private \DateTimeImmutable $rentDate;

  public function __construct(string $carName, float $value)
  {
    $this->name = $carName;
    $this->value = $value;

    $this->rentDate = parent::rentDate();

    $this->alreadyRented = true;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function getValue(): float
  {
    return $this->value;
  }

  public function getRentDate(): \DateTimeImmutable
  {
    return $this->rentDate;
  }

  public function disableRent(): void
  {
    $this->alreadyRented = false;
  }

  public function isAlreadyRented(): bool
  {
    return $this->alreadyRented;
  }
}
