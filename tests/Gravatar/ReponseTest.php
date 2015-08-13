<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */
namespace Gravatar;

use PHPUnit_Framework_TestCase;

/**
 * Unit test for {@see Response} class.
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class ResponseTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers Gravatar\Response::__construct
     */
    public function test__construct()
    {

    }

    /**
     * @covers Gravatar\Response::__toString
     */
    public function test__toString()
    {

    }

    /**
     * @covers Gravatar\Response::__toString
     */
    public function testGetBody()
    {

    }

    /**
     * @covers Gravatar\Response::getUri
     */
    public function testGetUri()
    {
        $uri = new Uri("https://www.gravatar.com/42ee56a548ee6259f9e44a66d1c3aa61.json");
        $request = $this->getMock("Gravatar\RequestInterface");
        $request->method("getUri")->willReturn($uri);
        $response = new Response($request);
        $this->assertSame($uri, $response->getUri());
    }
}
