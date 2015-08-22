<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

/**
 * Request to the gravatar.com for the serialized array profile data
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class Request extends AbstractRequest
{

    /**
     * Request to the gravatar.com for the php profile data
     *
     * @param Account $account Gravatar account
     */
    public function __construct(Account $account)
    {
        parent::__construct($account, "php");
    }

}
