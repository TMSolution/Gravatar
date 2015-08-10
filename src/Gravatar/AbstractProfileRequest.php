<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

/**
 * Request for the Gravatar profile
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
abstract class AbstractProfileRequest
{
    /**
     * Gravatar account
     * 
     * @var Account Gravatar account
     */
    protected $account = null;
    
    /**
     * Request scheme
     * 
     * @var string  Request scheme (default https)
     */
    protected $scheme = "https";
    
    /**
     * Gravatar profile format
     * 
     * @var string Gravatar profile format (default php)
     */
    protected $format = "";
    
    /**
     * New request for Gravatar profile in some format
     * 
     * @param Account $account Gravatar profile
     * @param string $format Profile format
     */
    public function __construct(Account $account, $format = "php")
    {
        $this->account = $account;
        $this->format = $format;
    }
    
    /**
     * Get request URI
     * 
     * @return string Request URI
     */
    public function __toString()
    {
        return (string) $this->getUri();
    }

    /**
     * New request for Gravatar profile with http protocol
     * 
     * @return AbstractProfileRequest New request for Gravatar profile with http protocol
     */
    public function withHttp()
    {
        $newRequest = clone $this;
        $newRequest->scheme = "http";
        return $newRequest;
    }

    /**
     * Get request URI for Gravatar profile
     * 
     * @return Uri Request URI for Gravatar profile
     */
    public function getUri()
    {
        $type = ($this->format != "") ? \sprintf(".%s", $this->format) : "";
        return new Uri(\sprintf("%s://www.gravatar.com/%s%s",
            $this->scheme,
            new Hash($this->account),
            $type
        ));
    }
    
    /**
     * Ensure both requests are equal.
     * 
     * Requests are equal if they points to the same URI.
     * 
     * @param AbstractProfileRequest $request Other request for Gravatar profile
     * @return string Request for the profile
     */
    public function equals(AbstractProfileRequest $request)
    {
        return $this->getUri()->equals($request->getUri());
    }
    
}
