<?php

final class ExplorationController
{
    /**
     * Handle the rover movement
     *
     * @param array<int, array<string, mixed>> $rovers
     **/
    public static function moveRovers(Plateau $plateau, array $rovers)
    {
        // Initialise an empty array to hold parked rover coordinates
        // Used to prevent collisions when moving rovers
        $parkedRovers = [];

        // Initialise an empty array to hold results that satisfy challenge result
        // requirements as well as unit test expected result format
        $result = [];

        // Create a new Rover object for each of the rovers in the $rovers array
        // Once created, move rover according to 'moves' instructions
        foreach ($rovers as $input) {

            $rover = new Rover($input['x'], $input['y'], $input['direction'], $input['moves']);
            $rover->turnAndMove($plateau, $parkedRovers);

            // Add results to the two arrays
            $parkedRovers[] = $rover->getXCoordinate() . $rover->getYCoordinate();
            $result[] = $rover->getXCoordinate() . ' ' . $rover->getYCoordinate() . ' ' . $rover->getDirection();
        }

        return $result;
    }
}
