<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

/**
 * Gravatar request for php array profile
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class ProfileRequest extends AbstractProfileRequest
{
    /**
     * New Gravatar request for php array profile
     * 
     * @param Account $account Gravatar account
     */
    public function __construct(Account $account)
    {
        parent::__construct($account, "php");
    }
}