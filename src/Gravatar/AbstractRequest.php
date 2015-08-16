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

    protected $path = "";

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

    /**
     * Get request URI
     *
     * @return Uri Request URI
     */
    public function getUri()
    {
        return new Uri(
            \sprintf("%s://%s/%s%s",
                $this->scheme,
                $this->host,
                $this->getPath(),
                ($this->type != "") ? \sprintf(".%s", $this->type) : ""
            )
        );
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

    protected function getPath()
    {
        return \sprintf("%s\\%s",
            $this->path,
            new Hash($this->account)
        );
    }

}
