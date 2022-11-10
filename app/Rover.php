<?php

final class Rover
{
    private const DIRECTION = ['N', 'E', 'S', 'W'];
    private const LEFT_DIRECTION = 'L';
    private const RIGHT_DIRECTION = 'R';

    private int $xCoordinate;
    private int $yCoordinate;
    private string $moves;
    private string $direction;

    public function  __construct(int $xCoordinate, int $yCoordinate, string $direction, string $moves)
    {
        $this->xCoordinate = $xCoordinate;
        $this->yCoordinate = $yCoordinate;
        $this->moves = $moves;
        $this->direction = $direction;
    }

    public function getXCoordinate(): int
    {
        return $this->xCoordinate;
    }

    public function getYCoordinate(): int
    {
        return $this->yCoordinate;
    }

    public function getDirection(): string
    {
        return $this->direction;
    }

    public function turn(string $direction) : void
    {
        // Use a numbered array of directions to allow turning left and right through array values
        $directions = self::DIRECTION;

        // Turn left or right, while controlling for turning left from the first element or right from the last element
        if ($direction == self::LEFT_DIRECTION) {
            $this->direction = $directions[array_search($this->direction, $directions) - 1] ?? $directions[count($directions) - 1];
        } elseif ($direction == self::RIGHT_DIRECTION) {
            $this->direction = $directions[array_search($this->direction, $directions) + 1] ?? $directions[0];
        }
    }

    /**
     * @param array<int, string> $parkedRovers
     */
    public function move(int $xEnd, int $yEnd, array $parkedRovers) : void
    {
        // Check current direction of rover and move one space in that direction
        // Do not allow move if it will cross boundary or a parked rover
        switch ($this->direction) {
            case 'N':
                if (!in_array((string)($this->xCoordinate . ($this->yCoordinate + 1)), $parkedRovers) && $this->yCoordinate < $yEnd) {
                    $this->yCoordinate++;
                }

                break;
            case 'S':
                if (!in_array((string)($this->xCoordinate . ($this->yCoordinate - 1)), $parkedRovers) && $this->yCoordinate > 0) {
                    $this->yCoordinate--;
                }

                break;
            case 'E':
                if (!in_array((string)($this->xCoordinate + 1 . $this->yCoordinate), $parkedRovers) && $this->xCoordinate < $xEnd) {
                    $this->xCoordinate++;
                }

                break;
            case 'W':
                if (!in_array((string)($this->xCoordinate - 1 . $this->yCoordinate), $parkedRovers) && $this->xCoordinate > 0) {
                    $this->xCoordinate--;
                }
                break;
        }
    }

    /**
     * @param array<int, string> $parkedRovers
     */
    public function turnAndMove(Plateau $plateau, array $parkedRovers): void
    {
        $moves = str_split($this->moves);

        for ($i = 0; $i < count($moves); $i++) {
            if ($moves[$i] == 'L' || $moves[$i] == 'R') {
                $this->turn($moves[$i]);
            } elseif ($moves[$i] == 'M') {
                $this->move($plateau->getXEnd(), $plateau->getYEnd(), $parkedRovers);
            }
        }
    }
}
