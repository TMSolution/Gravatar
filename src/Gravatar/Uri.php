<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */
namespace Gravatar;

/**
 * Gravatar URI
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class Uri
{

    /**
     * Gravatar URI
     * 
     * @var string Gravatar URI
     */
    protected $uri;

    /**
     * New Gravatar URI
     * 
     * @param string $uri Gravatar URI
     */
    public function __construct($uri)
    {
        $this->uri = $uri;
    }

    /**
     * Get Gravatar URI
     * 
     * @return string Uri Gravatar URI
     */
    public function __toString()
    {
        return $this->uri;
    }

    /**
     * Ensure that both URI's are equal
     * 
     * @param Uri $uri Other Gravatar URI
     * @return bool True if equal else false
     */
    public function equals(Uri $uri)
    {
        return $this == $uri;
    }

}
