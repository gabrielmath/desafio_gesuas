<?php

namespace Unit\src\Core;

use PHPUnit\Framework\TestCase;
use Source\Core\Session;

class SessionTest extends TestCase
{
    /** @test */
    public function itShouldVerifyIfExistsSession()
    {
        $name = 'user';
        $data = 'gabriel';

        $session = new Session();
        $session->set($name, $data);

        $this->assertEquals($session->has($name), $data);
    }
}
