<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

use PHPUnit_Framework_TestCase;

/**
 * Test for QrProfileRequest class
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class QrProfileRequestTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers Gravatar\QrProfileRequest::__construct
     */
    public function test__construct()
    {
        $request = new QrProfileRequest(new Account("krzysiekpiasecki@gmail.com"));
        $this->assertSame(
            "https://gravatar.com/42ee56a548ee6259f9e44a66d1c3aa61.qr",
            $request->__toString()
        );
        $request2 = new QrProfileRequest(new Account("krzysiekpiasecki@gmail.com"), 200);
        $this->assertSame(
            "https://gravatar.com/42ee56a548ee6259f9e44a66d1c3aa61.qr?size=200",
            $request2->__toString()
        );
    }

    /**
     * @covers Gravatar\QrProfileRequest::getUri
     */
    public function testGetUri()
    {
        $request = new QrProfileRequest(new Account("krzysiekpiasecki@gmail.com"));
        $this->assertTrue(
            (new Uri("https://gravatar.com/42ee56a548ee6259f9e44a66d1c3aa61.qr"))
                ->equals($request->getUri())
        );
        $request2 = new QrProfileRequest(new Account("krzysiekpiasecki@gmail.com"), 500);
        $this->assertTrue(
            (new Uri("https://gravatar.com/42ee56a548ee6259f9e44a66d1c3aa61.qr?size=500"))
                ->equals($request2->getUri())
        );
    }

}
