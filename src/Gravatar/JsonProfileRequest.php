<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

/**
 * Request to the gravatar.com for the JSON profile data
 *
 * @link http://en.gravatar.com/site/implement/profiles/json Gravatar JSON Profile Data
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class JsonProfileRequest extends AbstractProfileRequest
{
    /**
     * Callback name
     *
     * @var string Callback
     */
    protected $callback = "";

    /**
     * Request to the gravatar.com for the JSON profile data
     *
     * @param Account $account Gravatar account
     * @param string $callback Callback name
     */
    public function __construct(Account $account, $callback = "")
    {
        parent::__construct($account, "json");
        $this->callback = $callback;
    }

    /**
     *
     * @return \Gravatar\Uri Gravatar request for json profile
     */
    public function getUri()
    {
        return new Uri(\sprintf("%s%s",
            parent::getUri(),
                ($this->callback != "") ? \sprintf("?callback=%s", $this->callback) : "")
        );
    }

    /**
     * Get query part of request URI
     *
     * @return string Query part of URI
     */
    protected function getQuery()
    {
        return \sprintf("%s",
            ($this->callback != "") ? \sprintf("?callback=%s", $this->callback) : ""
        );
    }
}