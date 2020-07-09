<?php

namespace App\Tests\Task1;

use App\Task1\MultipleService;
use App\Tests\Common\BaseTestCase;

final class MultipleServiceTest extends BaseTestCase
{
    public function testGetAllMultiples(): void
    {
        $service = new MultipleService();
        $method = $this->getPrivateMethod($service, 'getAllMultiples');

        $this->assertEquals(
            [3, 6, 9],
            $method->invoke($service, 3, 10)
        );

        $this->assertEquals(
            [2, 4],
            $method->invoke($service, 2, 4)
        );
    }

    public function getSum(): void
    {
        $service = new MultipleService();
        $method = $this->getPrivateMethod($service, 'getSum');

        $this->assertEquals(
            23,
            $method->invoke($service, [3, 5], 10)
        );
    }
}
