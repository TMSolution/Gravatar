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
     * Ensure that both URI's are equal
     * 
     * @param Uri $uri Other URI
     * @return bool if equal return true otherwise false
     */
    public function equals(Uri $uri)
    {
        return $this == $uri;
    }

}
