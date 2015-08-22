<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

/**
 * Gravatar account
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
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
     * Gravatar account
     *
     * @param $email Account email
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string Email
     */
    public function __toString()
    {
        return $this->email;
    }

    /**
     * Compares two accounts
     *
     * @param Account $account Other account
     * @return bool true if this account is the same as the other account; false otherwise.
     */
    public function equals(Account $account)
    {
        return $this == $account;
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

}
