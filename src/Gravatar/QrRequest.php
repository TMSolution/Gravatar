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
class QrRequest extends AbstractRequest
{

    /**
     * Request to the gravatar.com for the QR profile data
     *
     * @param Account $account Gravatar account
     * @param int|null $size Size of QR image
     */
    public function __construct(Account $account, $size = null)
    {
        parent::__construct($account, "qr");
        $this->query['size'] = $size;
    }

}
