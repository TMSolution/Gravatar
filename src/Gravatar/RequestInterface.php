<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

/**
 * Request to the gravatar.com
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
interface RequestInterface
{
    /**
     * Get request to the gravatar.com
     *
     * @return Uri Request to the gravatar.com
     */
    public function getUri();
}