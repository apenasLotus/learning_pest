<?php

use LearningPest\Models\Rent\ModelCar;
use LearningPest\Models\Users\ModelUser;
use LearningPest\Repositories\DaoUsers;
use LearningPest\Service\LocatorService;

beforeEach(function () {
  $this->locator = new LocatorService;

  $this->car = new ModelCar('Fuscão Rosa', 10.000);
});

it('Mesmo usuário não pode fazer uma nova locação tendo uma já ativa', function ($ana, $pedro) {
  $this->locator->createRent($this->car, $pedro);

  $this->locator->createRent($this->car, $ana);
  $this->locator->createRent($this->car, $ana);
})->with('mockUsers')
  ->throws(Exception::class, 'Já possui uma locação ativa');

it('Retorno do array deve estar na ordem Ana e Pedro ao final da locação', function ($ana, $pedro) {
  $this->locator->createRent($this->car, $ana);
  $this->locator->createRent($this->car, $pedro);

  $rents = $this->locator->getRents();
  expect($rents)
    ->toHaveCount(2)
    ->toHaveKeys(['Ana', 'Pedro']);
})->with('mockUsers');

dataset('mockUsers', function () {
  $ana = new DaoUsers('Ana');
  $pedro = new DaoUsers('Pedro');

  $ana = new ModelUser($ana->getMockData());
  $pedro = new ModelUser($pedro->getMockData());

  return [
    [$ana, $pedro]
  ];
});
