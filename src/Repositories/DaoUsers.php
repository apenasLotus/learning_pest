<?php

namespace LearningPest\Repositories;

class DaoUsers
{
  private string $name, $nationality;
  private int $id, $age;

  public function __construct(string $name = 'Franchiesco Virgulinii Fioooon')
  {
    $this->id = 0;
    $this->name = $name;
    $this->age = 19;
    $this->nationality = 'Virgulinii';
  }

  public function getMockData()
  {
    return [
      'id' => $this->id,
      'name' => $this->name,
      'age' => $this->age,
      'nationality' => $this->nationality,
    ];
  }
}
