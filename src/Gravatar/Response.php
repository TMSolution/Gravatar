<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

/**
 * Response from gravatar.com
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class Response
{
    /**
     * Request to gravatar.com
     *
     * @var RequestInterface Request to gravatar.com
     */
    protected $request = null;

    /**
     * Response from gravatar.com
     *
     * @param RequestInterface $request Request to gravatar.com
     */
    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * Get whole response from gravatar.com
     *
     * @return string Response from gravatar.com
     */
    public function __toString()
    {
        return $this->getBody()->getContent();
    }

    /**
     * Get new response for the request
     *
     * @param RequestInterface $request
     * @return Response
     */
    public function withRequest(RequestInterface $request)
    {
        $newResponse = clone $this;
        $newResponse->request = $request;
        return $newResponse;
    }

    /**
     * Get Response URI
     *
     * @return Uri
     */
    public function getUri()
    {
        return $this->request->getUri();
    }

    /**
     * Get gravatar stream
     *
     * @return Stream Gravatar stream
     */
    public function getBody()
    {
        return new Stream(\fopen($this->request->getUri(), "r"));
    }

}
