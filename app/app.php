<?php
require_once('app/Input.php');
require_once('app/Plateau.php');
require_once('app/Rover.php');
require_once('app/controllers/ExplorationController.php');

echo "Provide Plateau Data\n";
$plateauInput = fgets(STDIN);

$roverData = [];
for($i = 0; $i < 1; ++$i) {
    echo "Provide Rover{$i} Data \n";
    $roverInput = fgets(STDIN);
    $movementInput = fgets(STDIN);

    $plateau = Input::plateauInputFromString($plateauInput);

    $roverData[] = Input::roverInputFromString($roverInput, $movementInput);
}

$outputData = ExplorationController::moveRovers($plateau, $roverData);

echo "\n\n\nResult\n";

foreach ($outputData as $result) {
    echo $result . "\n\n";
}