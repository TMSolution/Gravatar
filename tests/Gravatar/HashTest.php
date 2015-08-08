<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */
namespace Gravatar;

use ReflectionClass;
use PHPUnit_Framework_TestCase;

/**
 * Unit test for {@see Hash} class.
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class HashTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers Hash::__construct
     */
    public function test__construct()
    {
        $account = new Account("krzysiekpiasecki@gmail.com");
        $hash = new Hash($account);
        $class = new ReflectionClass($hash);
        $property = $class->getProperty("account");
        $property->setAccessible(true);
        $this->assertSame(
            $account,
            $property->getValue($hash)
        );
    }

    /**
     * @covers Hash::__toString
     */
    public function test__toString()
    {
        $hash = new Hash(new Account("krzysiekpiasecki@gmail.com"));
        $this->assertSame(
            "42ee56a548ee6259f9e44a66d1c3aa61",
            $hash->__toString()
        );
    }

    /**
     * @covers Hash::equals
     */
    public function testEquals()            
    {
        $hash = new Hash(new Account("krzysiekpiasecki@gmail.com"));
        $hash2 = new Hash(new Account("krzysiekpiasecki@gmail.com"));
        $hash3 = new Hash(new Account("krzysztofpiasecki@gmail.com"));
        $this->assertTrue($hash->equals($hash2));
        $this->assertTrue($hash2->equals($hash));
        $this->assertFalse($hash3->equals($hash));
    }

}
