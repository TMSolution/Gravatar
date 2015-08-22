<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */
namespace Gravatar;

use ReflectionClass;
use PHPUnit_Framework_TestCase;

/**
 * Test for Hash class.
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class HashTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers Gravatar\Hash::__construct
     */
    public function test__construct()
    {
        $account = new Account("joe.doe@example.com");
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
     * @covers Gravatar\Hash::__toString
     */
    public function test__toString()
    {
        $hash = new Hash(new Account("joe.doe@example.com"));
        $this->assertSame(
            "f4596eff172e0f64aceb4c6fa26e0cfe",
            $hash->__toString()
        );
    }

    /**
     * @covers Gravatar\Hash::equals
     */
    public function testEquals()            
    {
        $hash = new Hash(new Account("joe.doe@example.com"));
        $hash2 = new Hash(new Account("joe.doe@example.com"));
        $hash3 = new Hash(new Account("joedoe@example.com"));
        $this->assertTrue($hash->equals($hash2));
        $this->assertTrue($hash2->equals($hash));
        $this->assertFalse($hash3->equals($hash));
    }

    /**
     * @covers Gravatar\Hash::getHashCode
     */
    public function testGetHashCode()
    {
        $hash = new Hash(new Account("joe.doe@example.com"));
        $this->assertSame(
            "f4596eff172e0f64aceb4c6fa26e0cfe",
            $hash->getHashCode()
        );
    }
    
}
