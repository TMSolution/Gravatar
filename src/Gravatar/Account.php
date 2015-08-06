<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

class Account
{
    
    protected $email = "";
    
    public function __construct($email)
    {
        $this->email = $email;
    }
    
    public function getEmail() 
    {
        return $this->email;
    }
    
    public function __toString()
    {
        return $this->email;
    }

    public function equals(Account $account)
    {
        return $this == $account;
    }

}
