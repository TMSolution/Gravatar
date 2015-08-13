<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */


namespace Gravatar;

/**
 * Gravatar response content
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class Stream
{
    /**
     * Gravatar stream
     *
     * @var resource Gravatar stream
     */
    protected $stream = null;

    /**
     * Gravatar stream
     *
     * @param resource $stream Gravatar stream
     */
    public function __construct($stream)
    {
        $this->stream = $stream;
    }

    /**
     * Get response content
     *
     * @return string Response content
     */
    public function getContent()
    {
        return \stream_get_contents($this->stream);
    }
}