<?php

namespace App\Task2;

class GridService
{
    const NB  = 20;
    const MIN = 1;
    const MAX = 99;

    /**
     * @var GridResultH
     */
    private $resultH;

    /**
     * @var GridResultV
     */
    private $resultV;

    /**
     * @var GridResultD1
     */
    private $resultD1;

    /**
     * @var GridResultD2
     */
    private $resultD2;

    /**
     * @var array
     */
    private $numbers;

    public function __construct(array $numbers = [])
    {
        if ($this->isOkNumbers($numbers)) {
            $this->numbers = $numbers;
        } else {
            $this->randNumbers();
        }
    }

    private function isOkNumbers(array $numbers): bool
    {
        if (count($numbers) !== self::NB) {
            return false;
        }

        for ($i = 0; $i < self::NB; $i++) {
            if (!is_array($numbers[$i]) || count($numbers[$i]) !== self::NB) {
                return false;
            }
        }

        return true;
    }

    private function randNumbers(): array
    {
        for ($i = 0; $i < self::NB; $i++) {
            for ($j = 0; $j < self::NB; $j++) {
                $this->numbers[$i][$j] = rand(self::MIN, self::MAX);
            }
        }

        return $this->numbers;
    }

    public function getGreatestProduction(): int
    {
        $maxH  = 0;
        $maxV  = 0;
        $maxD1 = 0;
        $maxD2 = 0;

        for ($i = 0; $i < self::NB; $i++) {
            for ($j = 0; $j < self::NB; $j++) {
                $h = $this->getHorizontalProduction($i, $j);
                if ($maxH < $h) {
                    $maxH = $h;
                    $this->resultH = new GridResultH($i, $j, $h);
                }

                $v = $this->getVerticalProduction($i, $j);
                if ($maxV < $v) {
                    $maxV = $v;
                    $this->resultV = new GridResultV($i, $j, $v);
                }

                $d1 = $this->getDiagonalOneProduction($i, $j);
                if ($maxD1 < $d1) {
                    $maxD1 = $d1;
                    $this->resultD1 = new GridResultD1($i, $j, $d1);
                }

                $d2 = $this->getDiagonalTwoProduction($i, $j);
                if ($maxD2 < $d2) {
                    $maxD2 = $d2;
                    $this->resultD2 = new GridResultD2($i, $j, $d2);
                }
            }
        }

        return max($maxH, $maxV, $maxD1, $maxD2);
    }

    private function getVerticalProduction(int $i, int $j): int
    {
        if (!empty($this->numbers[$i + 3][$j])) {
            return $this->numbers[$i][$j] * $this->numbers[$i + 1][$j] * $this->numbers[$i + 2][$j] * $this->numbers[$i + 3][$j];
        }

        return 0;
    }

    private function getHorizontalProduction(int $i, int $j): int
    {
        if (!empty($this->numbers[$i][$j + 3])) {
            return $this->numbers[$i][$j] * $this->numbers[$i][$j + 1] * $this->numbers[$i][$j + 2] * $this->numbers[$i][$j + 3];
        }

        return 0;
    }

    private function getDiagonalOneProduction(int $i, int $j): int
    {
        if (!empty($this->numbers[$i + 3][$j + 3])) {
            return $this->numbers[$i][$j] * $this->numbers[$i + 1][$j + 1] * $this->numbers[$i + 2][$j + 2] * $this->numbers[$i + 3][$j + 3];
        }

        return 0;
    }

    private function getDiagonalTwoProduction(int $i, int $j): int
    {
        if (!empty($this->numbers[$i + 3][$j - 3]) && !empty($this->numbers[$i][$j])) {
            return $this->numbers[$i][$j] * $this->numbers[$i + 1][$j - 1] * $this->numbers[$i + 2][$j - 2] * $this->numbers[$i + 3][$j - 3];
        }

        return 0;
    }

    public function print(): void
    {
        for ($i = 0; $i < self::NB; $i++) {
            $str = '';
            for ($j = 0; $j < self::NB; $j++) {
                $x   = $this->numbers[$i][$j];
                $str .= $this->getTwoDigitsStr($x);
            }

            echo sprintf("%s\n", $str);
        }
    }

    public function printWithResult(): void
    {
        for ($i = 0; $i < self::NB; $i++) {
            $str = '';
            for ($j = 0; $j < self::NB; $j++) {
                $x         = $this->numbers[$i][$j];
                $numberStr = $this->getTwoDigitsStr($x);

                if ($this->resultH->isGridResult($i, $j)) {
                    $numberStr = $this->resultH->addColor($numberStr);
                }

                if ($this->resultV->isGridResult($i, $j)) {
                    $numberStr = $this->resultV->addColor($numberStr);
                }

                if ($this->resultD1->isGridResult($i, $j)) {
                    $numberStr = $this->resultD1->addColor($numberStr);
                }
                if ($this->resultD2->isGridResult($i, $j)) {
                    $numberStr = $this->resultD2->addColor($numberStr);
                }

                $str .= $numberStr;
            }

            echo sprintf("%s\n", $str);
        }
    }

    public function getTwoDigitsStr(int $x): string
    {
        return sprintf('%s ', $x < 10 ? '0' . $x : $x);
    }

    public function getResultH(): GridResultH
    {
        return $this->resultH;
    }

    public function getResultV(): GridResultV
    {
        return $this->resultV;
    }

    public function getResultD1(): GridResultD1
    {
        return $this->resultD1;
    }

    public function getResultD2(): GridResultD2
    {
        return $this->resultD2;
    }
}
