<?php

namespace App\Tests\Task1;

use App\Task2\GridResultV;
use PHPUnit\Framework\TestCase;

final class GridResultVTest extends TestCase
{
    public function testDTO(): void
    {
        $gridResult = new GridResultV(3, 4 , 20);

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
