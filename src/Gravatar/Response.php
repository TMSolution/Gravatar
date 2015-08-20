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
     * Http response headers
     *
     * @var array Http response headers
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
        $this->headers = $this->parseHttpHeaders($http_response_header);
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

    /**
     * Get http response code
     *
     * @return int Http response code
     */
    public function getResponseCode()
    {
        return $this->headers['Response-code'];
    }

    /**
     * Parse http headers into a headers map
     *
     * @param array $headers
     * @return array Http headers map
     */
    protected function parseHttpHeaders(array $headers)
    {
        $parsedHeaders = [];
        foreach ($headers as $field => $value) {
            $t = \explode(':', $value, 2);
            if (isset($t[1]) == true) {
                $parsedHeaders[\trim($t[0])] = \trim($t[1]);
            } else {
                $parsedHeaders[] = $value;
                if (\preg_match("#HTTP/[0-9\.]+\s+([0-9]+)#", $value, $out)) {
                    $parsedHeaders['Response-code'] = \intval($out[1]);
                }
            }
        }
        return $parsedHeaders;
    }

}
