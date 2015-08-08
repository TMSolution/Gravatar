<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

use PHPUnit_Framework_TestCase;

/**
 * Unit test for {@see ProfileRequest} class.
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class ProfileRequestTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers Gravatar\ProfileRequest::__construct
     */
    public function test__construct()
    {
        $request = new ProfileRequest(new Account("krzysiekpiasecki@gmail.com"));
        $this->assertSame(
            "https://www.gravatar.com/42ee56a548ee6259f9e44a66d1c3aa61.php",
            $request->__toString()
        );
    }
}
