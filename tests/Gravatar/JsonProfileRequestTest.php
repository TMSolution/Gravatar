<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

use PHPUnit_Framework_TestCase;

/**
 * Test for JsonProfileRequest class
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class JsonProfileRequestTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers Gravatar\JsonProfileRequest::__construct
     */
    public function test__construct()
    {
        $request = new JsonProfileRequest(new Account("krzysiekpiasecki@gmail.com"));
        $this->assertSame(
            "https://gravatar.com/42ee56a548ee6259f9e44a66d1c3aa61.json", 
             $request->__toString()
        );
        $request2 = new JsonProfileRequest(new Account("krzysiekpiasecki@gmail.com"), "alert");
        $this->assertSame(
            "https://gravatar.com/42ee56a548ee6259f9e44a66d1c3aa61.json?callback=alert",
            $request2->__toString()
        );
    }

}
