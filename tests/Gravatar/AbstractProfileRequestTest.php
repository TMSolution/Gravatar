<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

use ReflectionClass;
use PHPUnit_Framework_TestCase;

class MockProfileRequest extends AbstractProfileRequest {}

/**
 * Unit test for {@see AbstractProfileRequest} class.
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class AbstractProfileRequestTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers Gravatar\AbstractProfileRequest::__construct
     */
    public function test__construct()
    {
        $defaultScheme = "https";        
        $account = new Account('krzysiekpiasecki@gmail.com');
        $profileXmlFormat = "xml";
        $request = new MockProfileRequest($account, $profileXmlFormat);
        $class = new ReflectionClass($request);
        $propertyAccount = $class->getProperty('account');
        $propertyFormat = $class->getProperty('format');
        $propertyScheme = $class->getProperty('scheme');
        $propertyAccount->setAccessible(true);
        $propertyFormat->setAccessible(true);
        $propertyScheme->setAccessible(true);
        $this->assertSame($account, $propertyAccount->getValue($request));
        $this->assertSame($profileXmlFormat, $propertyFormat->getValue($request));
        $this->assertSame($defaultScheme, $propertyScheme->getValue($request));
        
        $account2 = new Account('krzysiekpiasecki@gmail.com'); // default profile    
        $request2 = new MockProfileRequest($account2);
        $class2 = new ReflectionClass($request2);
        $propertyAccount2 = $class2->getProperty('account');
        $propertyFormat2 = $class2->getProperty('format');
        $propertyScheme2 = $class2->getProperty('scheme');
        $propertyAccount2->setAccessible(true);
        $propertyFormat2->setAccessible(true);
        $propertyScheme2->setAccessible(true);
        $this->assertSame($account2, $propertyAccount2->getValue($request2));
        $this->assertSame("php", $propertyFormat2->getValue($request2));
        $this->assertSame($defaultScheme, $propertyScheme->getValue($request2));
    }

    /**
     * @covers Gravatar\AbstractProfileRequest::__toString
     */
    public function test__toString()
    {
        $request = new MockProfileRequest(new Account('krzysiekpiasecki@gmail.com'), "xml");
        $this->assertSame(
            "https://www.gravatar.com/42ee56a548ee6259f9e44a66d1c3aa61.xml",
            $request->__toString()
        );
        $request2 = new MockProfileRequest(new Account('krzysiekpiasecki@gmail.com'));        
        $this->assertSame(
            "https://www.gravatar.com/42ee56a548ee6259f9e44a66d1c3aa61.php",
            $request2->__toString()
        );        
    }

    /**
     * @covers Gravatar\AbstractProfileRequest::getUri
     */
    public function testGetUri()
    {
        $request = new MockProfileRequest(new Account('krzysiekpiasecki@gmail.com'), "xml");
        $this->assertTrue(
            (new Uri("https://www.gravatar.com/42ee56a548ee6259f9e44a66d1c3aa61.xml"))
                ->equals($request->getUri())
        );
        $request2 = new MockProfileRequest(new Account('krzysiekpiasecki@gmail.com'));        
        $this->assertTrue(
            (new Uri("https://www.gravatar.com/42ee56a548ee6259f9e44a66d1c3aa61.php"))
                ->equals($request2->getUri())
        );        
    }

    /**
     * @covers Gravatar\AbstractProfileRequest::withHttp
     */
    public function testWithHttp()
    {
        $request = new MockProfileRequest(new Account('krzysiekpiasecki@gmail.com'), "xml");
        $newRequest = $request->withHttp();
        $this->assertSame(
            "http://www.gravatar.com/42ee56a548ee6259f9e44a66d1c3aa61.xml",
            $newRequest->__toString());
        $this->assertNotSame($request, $newRequest);
        $newRequest2 = $request->withHttp();
        $this->assertEquals($newRequest, $newRequest2);        
    }
    
    /**
     * @covers Gravatar\AbstractProfileRequest::equals
     */
    public function testEquals()
    {
        $request = new MockProfileRequest(new Account('krzysiekpiasecki@gmail.com'), "xml");
        $this->assertTrue(
            $request->equals(new MockProfileRequest(new Account('krzysiekpiasecki@gmail.com'), "xml"))
        );
        $request2 = new MockProfileRequest(new Account('krzysiekpiasecki@gmail.com'));
        $this->assertTrue(
            $request2->equals(new MockProfileRequest(new Account('krzysiekpiasecki@gmail.com')))
        );
    }

}
