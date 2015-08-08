<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

/**
 * Gravatar request for vcf profile
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class VcfProfileRequest extends AbstractProfileRequest
{
    /**
     * New Gravatar request for vcf profile
     * 
     * @param Account $account Gravatar account
     */
    public function __construct(Account $account)
    {
        parent::__construct($account, "vcf");
    }
}