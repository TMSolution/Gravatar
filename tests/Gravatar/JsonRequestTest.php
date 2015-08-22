<?php

/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

use PHPUnit_Framework_TestCase;

/**
 * Test for JsonRequest class
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class JsonProfileRequestTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers Gravatar\JsonRequest::__construct
     */
    public function test__construct()
    {
        $request = new JsonRequest(new Account("joe.doe@example.com"));
        $this->assertSame(
            "https://gravatar.com/f4596eff172e0f64aceb4c6fa26e0cfe.json",
            $request->__toString()
        );
        $request2 = new JsonRequest(new Account("joe.doe@example.com"), "alert");
        $this->assertSame(
            "https://gravatar.com/f4596eff172e0f64aceb4c6fa26e0cfe.json?callback=alert",
            $request2->__toString()
        );
    }

}
