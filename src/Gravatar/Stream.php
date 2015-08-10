<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */


namespace Gravatar;

/**
 * Stream represents gravatar response content
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class Stream
{
    /**
     * Gravatar stream
     *
     * @var resource
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
     * Get gravatar response content
     *
     * @return string Whole response content
     */
    public function getContent()
    {
        return \stream_get_contents($this->stream);
    }
}