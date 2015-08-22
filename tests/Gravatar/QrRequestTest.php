<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

use PHPUnit_Framework_TestCase;

/**
 * Test for QrRequest class
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class QrRequestTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers Gravatar\QrRequest::__construct
     */
    public function test__construct()
    {
        $request = new QrRequest(new Account("joe.doe@example.com"));
        $this->assertSame(
            "https://gravatar.com/f4596eff172e0f64aceb4c6fa26e0cfe.qr",
            $request->__toString()
        );
        $request2 = new QrRequest(new Account("joe.doe@example.com"), 200);
        $this->assertSame(
            "https://gravatar.com/f4596eff172e0f64aceb4c6fa26e0cfe.qr?size=200",
            $request2->__toString()
        );
    }

}
