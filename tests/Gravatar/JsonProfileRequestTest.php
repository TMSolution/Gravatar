<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

use PHPUnit_Framework_TestCase;

/**
 * Unit test for {@see JsonProfileRequest} class.
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
            "https://www.gravatar.com/42ee56a548ee6259f9e44a66d1c3aa61.json",
            $request->__toString()
        );
        $request2 = new JsonProfileRequest(new Account("krzysiekpiasecki@gmail.com"), "alert");
        $this->assertSame(
            "https://www.gravatar.com/42ee56a548ee6259f9e44a66d1c3aa61.json?callback=alert",
            $request2->__toString()
        );        
    }

    /**
     * @covers Gravatar\JsonProfileRequest::getUri
     */
    public function testGetUri()
    {
        $request = new JsonProfileRequest(new Account("krzysiekpiasecki@gmail.com"));
        $this->assertTrue(
            (new Uri("https://www.gravatar.com/42ee56a548ee6259f9e44a66d1c3aa61.json"))
                ->equals($request->getUri())
        );
        $request2 = new JsonProfileRequest(new Account("krzysiekpiasecki@gmail.com"), "alert");
        $this->assertTrue(
            (new Uri("https://www.gravatar.com/42ee56a548ee6259f9e44a66d1c3aa61.json?callback=alert"))
                ->equals($request2->getUri())
        );
        
    }
    
}
