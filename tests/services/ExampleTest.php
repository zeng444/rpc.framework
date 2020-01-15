<?php

namespace Tests\Services;

use Services\Attachment\Manager;
use Tests\UnitCase;

/**
 *
 * @author Robert
 *
 * Class ApplicationTest
 */
class ExampleTest extends UnitCase
{

    /**
     * Author:Robert
     *
     */
    public function testEqCase()
    {
        $str = 'test';
        $this->assertEquals($str, 'test', 'test testEqCase');
    }
}
