<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

/**
 * Gravatar hash
 *
 * @link http://en.gravatar.com/site/implement/hash Gravatar hash
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class Hash
{

    /**
     * Gravatar account
     * 
     * @var Account  Gravatar account
     */
    protected $account = null;

    /**
     * Gravatar hash
     * 
     * @param Account $account Gravatar account
     */
    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    /**
     * Get Gravatar hash
     * 
     * @return string Gravatar hash
     */
    public function __toString()
    {
        return \md5(\trim(\mb_strtolower($this->account->getEmail())));
    }

    /**
     * Ensure that two Hashes are equal
     *
     * @param Hash $hash Other hash
     * @return bool if equal true otherwise false
     */
    public function equals(Hash $hash)
    {
        return $this == $hash;
    }

}
