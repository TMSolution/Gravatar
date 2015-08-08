<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

use PHPUnit_Framework_TestCase;

/**
 * Unit test for {@see XmlProfileRequest} class.
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class XmlProfileRequestTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers Gravatar\XmlProfileRequest::__construct
     */
    public function test__construct()
    {
        $request = new XmlProfileRequest(new Account("krzysiekpiasecki@gmail.com"));
        $this->assertSame(
            "https://www.gravatar.com/42ee56a548ee6259f9e44a66d1c3aa61.xml",
            $request->__toString()
        );
    }
}
