<?php

namespace App\Task2;

interface GridResultInterface
{
    public function __construct(int $i = 0, int $j = 0, int $result = 0);

    public function getI(): int;

    public function getJ(): int;

    public function getResult(): int;

    public function isGridResult(int $i, int $j): bool;

    public function addColor(string $str): string;
}
