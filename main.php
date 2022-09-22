<?php 

spl_autoload_register();

use App\Core\Controllers\Farm;
use App\Controllers\Chicken;
use App\Controllers\Cow;

$farm = new Farm;

// Система должна добавить животных в хлев (10 коров и 20 кур).
foreach (range(1, 10) as $i) {
    $farm->addAnimal(new Cow());
}
foreach (range(11, 30) as $i) {
    $farm->addAnimal(new Chicken());
}

// Вывести на экран информацию о количестве каждого типа животных на ферме.
echo " ---- added animal ---- " . PHP_EOL;
echo "count " . Cow::getType() . " - " . $farm->getAnimals(Cow::class) . PHP_EOL;
echo "count " . Chicken::getType() . " - " . $farm->getAnimals(Chicken::class) . PHP_EOL;

// 7 раз (неделю) произвести сбор продукции (подоить коров и собрать яйца у кур).
$farm->setCollect(7);
echo " ---- collected 7 days ---- " . PHP_EOL;

// Вывести на экран общее кол-во собранных за неделю шт. яиц и литров молока.
echo "unit 7d " . Cow::PRODUCT . " - " . $farm->getReport(Cow::class, 7) . Cow::UNIT . PHP_EOL;
echo "unit 7d " . Chicken::PRODUCT . " - " . $farm->getReport(Chicken::class, 7) . Chicken::UNIT . PHP_EOL;

// Добавить на ферму ещё 5 кур и 1 корову (съездили на рынок, купили животных).
foreach (range(31, 35) as $i) {
    $farm->addAnimal(new Chicken());
}
$farm->addAnimal(new Cow(36));
echo " ---- added animal ---- " . PHP_EOL;

// Снова вывести информацию о количестве каждого типа животных на ферме.
echo "count " . Cow::getType() . " - " . $farm->getAnimals(Cow::class) . PHP_EOL;
echo "count " . Chicken::getType() . " - " . $farm->getAnimals(Chicken::class) . PHP_EOL;

// Снова 7 раз (неделю) производим сбор продукции и выводим результат на экран.
$farm->setCollect(7);
echo " ---- collected 7 days ---- " . PHP_EOL;
echo "unit all " . Cow::PRODUCT . " - " . $farm->getReport(Cow::class) . Cow::UNIT . PHP_EOL;
echo "unit all " . Chicken::PRODUCT . " - " . $farm->getReport(Chicken::class) . Chicken::UNIT . PHP_EOL;

