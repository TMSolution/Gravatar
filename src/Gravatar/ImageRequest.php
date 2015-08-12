<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

/**
 * Represents request for gravatar
 */
class ImageRequest implements RequestInterface
{
    protected $account = null;

    protected $parameters = [
        'email' => '',
        'protocol' => 'https',
        'image-type' => '',
        'size' => '',
        'default-image' => '',
        'force-default' => false,
        'rating' => ''
    ];

    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    public function withHttp()
    {
        $imageRequest = clone $this;
        $imageRequest->parameters['protocol'] = 'http';
        return $imageRequest;
    }

    public function withHttps()
    {
        $imageRequest = clone $this;
        $imageRequest->parameters['protocol'] = 'https';
        return $imageRequest;
    }

    public function withAccount(Account $account)
    {
        $imageRequest = clone $this;
        $imageRequest->account = $account;
        return $imageRequest;
    }

    public function withJpg()
    {
        $imageRequest = clone $this;
        $imageRequest->parameters['image-type'] = 'jpg';
        return $imageRequest;
    }

    public function withPng()
    {
        $imageRequest = clone $this;
        $imageRequest->parameters['image-type'] = 'png';
        return $imageRequest;
    }

    public function withSize($size)
    {
        $imageRequest = clone $this;
        $imageRequest->parameters['size'] = $size;
        return $imageRequest;
    }

    public function withDefaultImage($url)
    {
        $imageRequest = clone $this;
        $imageRequest->parameters['default-image'] = $url;
        return $imageRequest;
    }

    public function withForceDefault()
    {
        $imageRequest = clone $this;
        $imageRequest->parameters['force-default'] = true;
        return $imageRequest;
    }

    public function withRating($rating)
    {
        $imageRequest = clone $this;
        $imageRequest->parameters['rating'] = $rating;
        return $imageRequest;
    }

    public function getUri()
    {
        $protocol = $this->parameters['protocol'];
        $domain = $protocol == 'http' ? "www.gravatar.com" : "secure.gravatar.com";
        $gravatarHash = new Hash($this->account);
        $image = ($this->parameters['image-type'] === '') ? '' : \sprintf(".%s", $this->parameters['image-type']);

        $attr = [];
        if ($this->parameters['size']) {
            $attr[] = \sprintf("size=%d", $this->parameters['size']);
        }
        if ($this->parameters['default-image']) {
            $attr[] = \sprintf("default=%s", \rawurlencode($this->parameters['default-image']));
        }
        if ($this->parameters['force-default'] === true) {
            $attr[] = "forcedefault=y";
        }
        if ($this->parameters['rating'] != '') {
            $attr[] = \sprintf("rating=%s", $this->parameters['rating']);
        }

        $queryParameters = "";
        if (\count($attr) > 0) {
            $queryParameters = \sprintf("?%s", join("&", $attr));
        }

        return new Uri(sprintf("%s://%s/avatar/%s%s%s",
            $protocol,
            $domain,
            $gravatarHash,
            $image,
            $queryParameters
        ));
    }

    public function __toString()
    {
        return $this->getUri()->__toString();
    }

}
