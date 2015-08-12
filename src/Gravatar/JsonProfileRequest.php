<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

/**
 * Gravatar request for json profile
 *
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
     * New Gravatar request for json profile
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
}