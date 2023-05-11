<?php

use LearningPest\Models\Rent\ModelCar;
use LearningPest\Models\Users\ModelUser;
use LearningPest\Repositories\DaoUsers;
use LearningPest\Service\LocatorService;

require_once __DIR__ . '/vendor/autoload.php';

$daoData = new DaoUsers;
$franchiesco = new ModelUser($daoData->getMockData());

$fuscaRosa = new ModelCar($franchiesco, 'Fusca Rosa', 12.000);

$locator = new LocatorService;
$locator->createRent($fuscaRosa);
// $locator->createRent($fuscaRosa);

echo '<pre>';
print_r($locator->getRents());
echo '</pre>';
exit;
