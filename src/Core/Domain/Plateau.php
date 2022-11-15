<?php

final class Plateau
{
    private int $xEnd;
    private int $yEnd;

    public function __construct(int $xEnd, int $yEnd)
    {
        $this->xEnd = $xEnd;
        $this->yEnd = $yEnd;
    }

    public function getXEnd(): int
    {
        return $this->xEnd;
    }

    public function getYEnd(): int
    {
        return $this->yEnd;
    }
}
