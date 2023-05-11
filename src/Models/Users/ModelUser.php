<?php

namespace LearningPest\Models\Users;

class ModelUser
{
  private int $id, $age;
  private string $name, $nationality;

  public function __construct(array $users)
  {
    $this->id = $users['id'];
    $this->age = $users['age'];
    $this->name = $users['name'];
    $this->nationality = $users['nationality'];
  }

  public function id(): int
  {
    return $this->id;
  }

  public function name(): string
  {
    return $this->name;
  }

  public function age(): int
  {
    return $this->age;
  }

  public function nationality(): string
  {
    return $this->nationality;
  }
}
