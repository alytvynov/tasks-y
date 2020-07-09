<?php

namespace App\Tests\Task1;

use App\Task2\GridResultH;
use PHPUnit\Framework\TestCase;

final class GridResultHTest extends TestCase
{
    public function testDTO(): void
    {
        $gridResult = new GridResultH(3, 4 , 20);

        $this->assertEquals(
            3,
            $gridResult->getI()
        );

        $this->assertEquals(
            4,
            $gridResult->getJ()
        );

        $this->assertEquals(
            20,
            $gridResult->getResult()
        );
    }
}
