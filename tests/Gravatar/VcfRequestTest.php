<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

use PHPUnit_Framework_TestCase;

/**
 * Test for VcfRequest
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class VcfRequestTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers Gravatar\VcfRequest::__construct
     */
    public function test__construct()
    {
        $request = new VcfRequest(new Account("joe.doe@example.com"));
        $this->assertSame(
            "https://gravatar.com/f4596eff172e0f64aceb4c6fa26e0cfe.vcf",
            $request->__toString()
        );
    }

}
