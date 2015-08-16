<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

use ReflectionClass;

/**
 * Test for Account class.
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class AccountTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Gravatar\Account::__construct
     */
    public function test__construct()
    {
        $account = new Account("krzysiekpiasecki@gmail.com");
        $class = new ReflectionClass($account);
        $property = $class->getProperty("email");
        $property->setAccessible(true);
        $this->assertSame("krzysiekpiasecki@gmail.com", $property->getValue($account));
    }

    /**
     * @covers Gravatar\Account::getEmail
     */
    public function testGetEmail()
    {
        $account = new Account("krzysiekpiasecki@gmail.com");
        $this->assertSame("krzysiekpiasecki@gmail.com", $account->getEmail());
    }

    /**
     * @covers Gravatar\Account::__toString
     */
    public function test__toString()
    {
        $account = new Account("krzysiekpiasecki@gmail.com");
        $this->assertSame("krzysiekpiasecki@gmail.com", $account->__toString());
    }

    /**
     * @covers Gravatar\Account::equals
     */
    public function testEquals()
    {
        $account = new Account("krzysiekpiasecki@gmail.com");
        $account2 = clone $account;
        $account3 = new Account("krzysztofpiasecki@gmail.com");
        $this->assertTrue($account->equals($account2));
        $this->assertTrue($account2->equals($account));
        $this->assertFalse($account3->equals($account));
        $this->assertFalse($account->equals($account3));
    }

}
