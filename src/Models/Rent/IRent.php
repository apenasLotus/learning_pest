<?php

namespace LearningPest\Models\Rent;

interface IRent
{
  public function isAlreadyRented(): bool;
  public function disableRent(): void;
}
