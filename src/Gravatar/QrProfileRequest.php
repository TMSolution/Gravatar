<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

/**
 * Request to the gravatar.com for the QR profile data
 *
 * @link http://en.gravatar.com/site/implement/profiles/qr Gravatar QR Profile Data
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class QrProfileRequest extends AbstractProfileRequest
{
    /**
     * Size of QR image
     * 
     * @var int 
     */
    protected $size = null;

    /**
     * Request to the gravatar.com for the QR profile data
     *
     * @param Account $account Gravatar account
     * @param int|null $size Size of QR image
     */
    public function __construct(Account $account, $size = null)
    {
        parent::__construct($account, "qr");
        if ($size != null) {
            $this->size = $size;
        }
    }

    /**
     * Get request URI
     *
     * @return Uri Request URI
     */
    public function getUri()
    {
        return new Uri(
            \sprintf("%s%s",
                parent::getUri(),
                $this->getQuery()
            )
        );
    }

    /**
     * Get query part of request URI
     *
     * @return string Query part of the URI
     */
    protected function getQuery()
    {
        return \sprintf("%s",
            ($this->size != null) ? \sprintf("?size=%d", $this->size) : ""
        );
    }
}