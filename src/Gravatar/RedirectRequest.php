<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

/**
 * Request to the gravatar.com for the JSON profile data
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class RedirectRequest extends AbstractRequest
{

    public function send()
    {
        \header(\sprintf("Location: %s", $this->getUri()));
        exit();
    }
    
}
