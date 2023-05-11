<?php

namespace LearningPest\Models\Rent;

abstract class AbstractRent implements IRent
{
  abstract public function isAlreadyRented(): bool;
  abstract public function disableRent(): void;

  protected function rentDate(): \DateTimeImmutable
  {
    return new \DateTimeImmutable('now');
  }
}
