<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

/**
 * Request to the gravatar.com for the JSON profile data
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class JsonRequest extends AbstractRequest
{

    /**
     * Request to the gravatar.com for the JSON profile data
     *
     * @param Account $account Gravatar account
     * @param string $callback Callback name
     */
    public function __construct(Account $account, $callback = "")
    {
        parent::__construct($account, "json");
        $this->query["callback"] = $callback;
    }

}
