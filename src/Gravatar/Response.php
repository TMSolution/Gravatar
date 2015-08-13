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
     * @var AbstractRequest Request to gravatar.com
     */
    protected $request = null;

    /**
     * Response from gravatar.com
     *
     * @param AbstractRequest $request Request to gravatar.com
     */
    public function __construct(AbstractRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Get response data from gravatar.com
     *
     * @return string Response data from gravatar.com
     */
    public function __toString()
    {
        return $this->getBody()->getContent();
    }

    /**
     * Get new response for the request
     *
     * @param AbstractRequest $request Request to gravatar.com
     * @return Response New response for the request
     */
    public function withRequest(AbstractRequest $request)
    {
        $newResponse = clone $this;
        $newResponse->request = $request;
        return $newResponse;
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
