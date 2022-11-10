<?php

final class Input
{
    public static function plateauInputFromString(string $input): Plateau
    {
        $inputArray = self::toArray($input);

        if (count($inputArray) !== 2) {
            throw new InvalidArgumentException('Expected Input int(X Y)');
        }

        if (!self::IsDigit($inputArray)) {
            throw new InvalidArgumentException(sprintf('Input values have to be Integer Expected Input (int(X) int(Y)) given %s', implode(' ', $inputArray)));
        }

        return new Plateau((int) $inputArray[0], (int) $inputArray[1]);
    }

    /**
     * @return array<string, mixed>
     */
    public static function roverInputFromString(string $input, string $movementInput): array
    {
        $inputArray = self::toArray($input);

        if (count($inputArray) !== 3) {
            throw new InvalidArgumentException('Expected Input int(X Y D)');
        }

        if (!self::IsDigit($inputArray)) {
            throw new InvalidArgumentException(sprintf('Input values have to be Integer Expected Input (int(X) int(Y) char(D)) given %s', implode(' ', $inputArray)));
        }

        return  ['x' => $inputArray[0], 'y' => $inputArray[1], 'direction' => $inputArray[2], 'moves' => $movementInput];
    }

    /**
     * @param array<int, mixed> $inputArray
     */
    private static function IsDigit(array $inputArray): bool
    {
        return (ctype_digit($inputArray[0]) && ctype_digit($inputArray[1]));
    }

    /**
     * @return array<int, mixed>
     */
    private static function toArray(string $input): array
    {
        return explode(' ', trim($input));
    }
}