<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */
namespace Gravatar;

use ReflectionClass;
use PHPUnit_Framework_TestCase;

/**
 * Unit test for {@see URI} class.
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class UriTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers Uri::__construct
     */
    public function test__construct()
    {
        $uri = new Uri("http://1.gravatar.com/avatar/42ee56a548ee6259f9e44a66d1c3aa61");
        $class = new ReflectionClass($uri);
        $property = $class->getProperty("uri");
        $property->setAccessible(true);
        $this->assertSame(
            "http://1.gravatar.com/avatar/42ee56a548ee6259f9e44a66d1c3aa61",
            $property->getValue($uri)
        );
    }

    /**
     * @covers Uri::__toString
     */
    public function test__toString()
    {
        $uri = new Uri("http://1.gravatar.com/avatar/42ee56a548ee6259f9e44a66d1c3aa61");
        $this->assertSame(
            "http://1.gravatar.com/avatar/42ee56a548ee6259f9e44a66d1c3aa61",
            $uri->__toString()
        );
    }

    /**
     * @covers Uri::equals
     */
    public function testEquals()            
    {
        $uri = new Uri("http://1.gravatar.com/avatar/42ee56a548ee6259f9e44a66d1c3aa61");
        $uri2 = clone $uri;
        $uri3 = new Uri("http://2.gravatar.com/avatar/42ee56a548ee6259f9e44a66d1c3aa61");
        $this->assertTrue($uri->equals($uri2));
        $this->assertTrue($uri2->equals($uri));
        $this->assertFalse($uri3->equals($uri2));
        $this->assertFalse($uri2->equals($uri3));        
    }

}
