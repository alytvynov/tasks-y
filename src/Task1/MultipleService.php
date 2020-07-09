<?php

namespace App\Task1;

class MultipleService
{
    public function getSum(array $numbers, int $to): int
    {
        $sum = 0;

        foreach ($numbers as $number)
        {
            $multiples = $this->getAllMultiples($number, $to);
            $sum += array_sum($multiples);
        }

        return $sum;
    }

    private function getAllMultiples(int $multiple, int $to): array
    {
        $all = [];

        for ($i = 1; $i <= $to; $i++) {
            if ($i % $multiple == 0) {
                $all[] = $i;
            }
        }

        return $all;
    }
}
