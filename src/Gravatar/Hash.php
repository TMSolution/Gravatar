<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

/**
 * Gravatar hash
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class Hash
{

    /**
     * Gravatar account
     * 
     * @var Account Gravatar account
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
     * Get hash
     * 
     * @return string Hash
     */
    public function __toString()
    {
        return \md5(\trim(\mb_strtolower($this->account)));
    }

    /**
     * Compares two hashes.
     *
     * @param Hash $hash Other $hash
     * @return bool true if this hash is the same as the other hash; false otherwise.
     */
    public function equals(Hash $hash)
    {
        return $this == $hash;
    }
    
    /**
     * Get account hash code.
     * 
     * @return string Account hash code
     */
    public function getHashCode()
    {
        return (string) $this;
    }

}
