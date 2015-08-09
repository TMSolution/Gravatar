<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

/**
 * Gravatar request for qr profile
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class QrProfileRequest extends AbstractProfileRequest
{
    /**
     * Size of QR image
     * 
     * @var int 
     */
    protected $size = 80;
    /**
     * New Gravatar request for qr profile
     * 
     * @param Account $account Gravatar account
     */
    public function __construct(Account $account, $size = 80)
    {
        parent::__construct($account, "qr");
        $this->size = $size;
    }
    
    /**
     * 
     * @return \Gravatar\Uri Gravatar request for qr profile
     */
    public function getUri()
    {
        return new Uri(\sprintf("%s?s=%d", parent::getUri(), $this->size));
    }
}