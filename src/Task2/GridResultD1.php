<?php

namespace App\Task2;

class GridResultD1 implements GridResultInterface
{
    /**
     * @var int
     */
    private $i;

    /**
     * @var int
     */
    private $j;

    /**
     * @var int
     */
    private $result;

    public function __construct(int $i = 0, int $j = 0, int $result = 0)
    {
        $this->i      = $i;
        $this->j      = $j;
        $this->result = $result;
    }

    public function getI(): int
    {
        return $this->i;
    }

    public function getJ(): int
    {
        return $this->j;
    }

    public function getResult(): int
    {
        return $this->result;
    }

    public function isGridResult(int $i, int $j): bool
    {
        return ($i == $this->i && $j == $this->j) ||
            ($i == $this->i + 1 && $j == $this->j + 1) ||
            ($i == $this->i + 2 && $j == $this->j + 2) ||
            ($i == $this->i + 3 && $j == $this->j + 3);
    }

    public function addColor(string $str): string
    {
        return sprintf("\033[31m%s\033[0m", $str);
    }
}
