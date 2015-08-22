<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

/**
 * URI
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class Uri
{

    /**
     * URI
     * 
     * @var string URI
     */
    protected $uri = "";

    /**
     * URI
     * 
     * @param string $uri URI
     */
    public function __construct($uri)
    {
        $this->uri = $uri;
    }

    /**
     * Get URI
     * 
     * @return string URI
     */
    public function __toString()
    {
        return $this->uri;
    }

    /**
     * Compares two URI's
     *
     * @param Uri $uri Other URI
     * @return bool true if this URI is the same as the other URI; false otherwise.
     */
    public function equals(Uri $uri)
    {
        return $this == $uri;
    }

}
