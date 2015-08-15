<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

/**
 * Abstract request to the gravatar.com
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class AbstractRequest
{
    /**
     * Gravatar account
     *
     * @var Account Gravatar account
     */
    protected $account = null;

    /**
     * Request type
     *
     * @var string Request type
     */
    protected $type = "";

    /**
     * Request host
     *
     * @var string Request host
     */
    protected $host = "gravatar.com";

    /**
     * Request scheme
     *
     * @var string Request scheme
     */
    protected $scheme = "https";

    /**
     * Request query parameters
     * 
     * @var array Query parameters 
     */
    protected $query = [];
    
    /**
     * Abstract request
     *
     * @param Account $account Gravatar account
     * @param string $type Request type
     */
    public function __construct(Account $account, $type = "")
    {
        $this->account = $account;
        $this->type = $type;
    }

    /**
     * Get request URI
     *
     * @return string Request URI
     */
    public function __toString()
    {
        return (string)$this->getUri();
    }

    /**
     * Ensure both requests are equal
     *
     * Requests are equal if they points to the same URI
     *
     * @param AbstractRequest $request Other request
     * @return bool True if equal otherwise false
     */
    public function equals(AbstractRequest $request)
    {
        return $this->getUri()->equals($request->getUri());
    }
    
    /**
     * Get Gravatar account
     * 
     * @return Account Gravatar Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Get request URI
     *
     * @return Uri Request URI
     */
    public function getUri()
    {
        return new Uri(
            \sprintf("%s://%s/%s%s%s",
                $this->getScheme(),
                $this->getHost(),
                $this->getPath(),
                ($this->getType() != "") ? \sprintf(".%s", $this->getType()) : "",
                $this->getQuery()
            )
        );
    }

    /**
     * Get request type
     * 
     * @return string Request type
     */
    public function getType()
    {
        return $this->type;
    }
    
    /**
     * Get request query
     * 
     * @return string Request query
     */
    public function getQuery()
    {
        $query = [];
        foreach ($this->query as $param => $value) {
            if ($value == "") {
                continue;
            }
            $query[] = \sprintf("%s=%s", $param, $value);
        }
        return (\count($query) > 0) ? \sprintf("?%s", \join("&", $query)) : "";
    }

    /**
     * Get request path
     * 
     * @return string Request Path
     */
    public function getPath()
    {
        return (string) new Hash($this->account);
    }
    
    /**
     * Get request host
     * 
     * @return string Request host
     */
    public function getHost()
    {
        return $this->host;
    }
    
    /**
     * Get request scheme
     * 
     * @return string Request scheme
     */
    public function getScheme()
    {
        return $this->scheme;
    }
    
    /**
     * Get new request with http scheme
     *
     * @return AbstractProfile New request with http scheme
     */
    public function withHttp()
    {
        $newRequest = clone $this;
        $newRequest->scheme = "http";
        return $newRequest;
    }

    /**
     * Get new request with https scheme
     *
     * @return AbstractProfile New request with https scheme
     */
    public function withHttps()
    {
        $newRequest = clone $this;
        $newRequest->scheme = "https";
        return $newRequest;
    }
    
}
