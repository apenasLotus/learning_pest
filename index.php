<?php

use LearningPest\Models\Rent\ModelCar;
use LearningPest\Models\Users\ModelUser;
use LearningPest\Repositories\DaoUsers;
use LearningPest\Service\LocatorService;

require_once __DIR__ . '/vendor/autoload.php';

$ana = new DaoUsers('Ana');
$ana = new ModelUser($ana->getMockData());

$francisco = new DaoUsers('Francisco');
$francisco = new ModelUser($francisco->getMockData());

$car = new ModelCar('Fusca Rosa', 12.000);

$locator = new LocatorService;
$locator->createRent($car, $ana);
$locator->createRent($car, $francisco);

echo '<pre>';
print_r($locator->getRents());
echo '</pre>';
exit;
