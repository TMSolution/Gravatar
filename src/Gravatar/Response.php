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
     * Response headers
     * 
     * @var array Response headers
     */
    protected $headers = [];
    
    /**
     * Whole response body
     * 
     * @var string Whole response body
     */
    protected $body = "";
    
    /**
     * Response from gravatar.com
     *
     * @param AbstractRequest $request Request to gravatar.com
     */
    public function __construct(AbstractRequest $request)
    {
        $this->body = \file_get_contents($request->getUri());
        $this->headers = $http_response_header;
    }

    /**
     * Get response data from gravatar.com
     *
     * @return string Response data from gravatar.com
     */
    public function __toString()
    {
        return $this->body;
    }

    /**
     * Get whole body of response
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }
    
    /**
     * Get response headers
     *
     * @return headers
     */
    public function getHeaders()
    {
        return $this->headers;
    }

}
