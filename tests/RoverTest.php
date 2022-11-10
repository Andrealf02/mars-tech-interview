<?php

use PHPUnit\Framework\TestCase;

require_once('app/Rover.php');
require_once('app/Plateau.php');
require_once('app/controllers/ExplorationController.php');

class ExplorationControllerTest extends TestCase
{
    public function testGoogleTestCases()
    {
        // Plateau top right coordinates
        $plateauInput = [5, 5];

        // Rovers start, direction and move values
        $rovers = [
            ['x' => 1, 'y' => 2, 'direction' => 'N', 'moves' => 'LMLMLMLMM'],
            ['x' => 3, 'y' => 3, 'direction' => 'E', 'moves' => 'MMRMMRMRRM'],
        ];

        // Expected results
        $expected = [
            '1 3 N',
            '5 1 E',
        ];

        // Initialise a new Pleateau object
        $plateau = new Plateau($plateauInput[0], $plateauInput[1]);

        $results = ExplorationController::moveRovers($plateau, $rovers);

        foreach ($results as $index => $rover) {
            $this->assertEquals($rover, $expected[$index]);
        }
    }

    public function testMovement()
    {
        // Plateau top right coordinates
        $plateauInput = [5, 5];

        // Rovers start, direction and move values
        $rovers = [
            ['x' => 1, 'y' => 2, 'direction' => 'N', 'moves' => 'MRMLMMRM'],
            ['x' => 4, 'y' => 5, 'direction' => 'N', 'moves' => 'MRMLMMRLM'],
            ['x' => 0, 'y' => 0, 'direction' => 'N', 'moves' => 'MRMLMMRLM'],
            ['x' => 0, 'y' => 0, 'direction' => 'N', 'moves' => ''],
            ['x' => 0, 'y' => 0, 'direction' => 'N', 'moves' => 'XRLMMTYI'],
        ];

        // Expected results
        $expected = [
            '3 5 E',
            '5 5 N',
            '1 4 N',
            '0 0 N',
            '0 2 N',
        ];

        // Initialise a new Pleateau object
        $plateau = new Plateau($plateauInput[0], $plateauInput[1]);

        $results = ExplorationController::moveRovers($plateau, $rovers);

        foreach ($results as $index => $rover) {
            $this->assertEquals($rover, $expected[$index]);
        }
    }

    public function testOneRover()
    {
        // Plateau top right coordinates
        $plateauInput = [5, 5];

        // Rovers start, direction and move values
        $rovers = [
            ['x' => 1, 'y' => 2, 'direction' => 'N', 'moves' => 'MRMLMMRM'],
        ];

        // Expected results
        $expected = [
            '3 5 E',
        ];

        // Initialise a new Pleateau object
        $plateau = new Plateau($plateauInput[0], $plateauInput[1]);

        $results = ExplorationController::moveRovers($plateau, $rovers);

        foreach ($results as $index => $rover) {
            $this->assertEquals($rover, $expected[$index]);
        }
    }

    public function testLargePlateau()
    {
        // Plateau top right coordinates
        $plateauInput = [5000, 5000];

        // Rovers start, direction and move values
        $rovers = [
            ['x' => 657, 'y' => 3499, 'direction' => 'N', 'moves' => 'MRMLMMRM'],
        ];

        // Expected results
        $expected = [
            '659 3502 E',
        ];

        // Initialise a new Pleateau object
        $plateau = new Plateau($plateauInput[0], $plateauInput[1]);

        $results = ExplorationController::moveRovers($plateau, $rovers);

        foreach ($results as $index => $rover) {
            $this->assertEquals($rover, $expected[$index]);
        }
    }
}
