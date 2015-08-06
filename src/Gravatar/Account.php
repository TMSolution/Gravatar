<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

/**
 * Gravatar account
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmial.com>
 */
class Account
{

    /**
     * Account email
     *
     * @var string Account email
     */
    protected $email = "";

    /**
     * New Gravatar account
     *
     * @param $email Account email
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Get account email
     *
     * @return string Account email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get account email
     *
     * @return string Account email
     */
    public function __toString()
    {
        return $this->email;
    }

    /**
     * Ensure that two Accounts are equal
     *
     * @param Account $account Other account
     * @return bool if equal return true otherwise false
     */
    public function equals(Account $account)
    {
        return $this == $account;
    }

}
