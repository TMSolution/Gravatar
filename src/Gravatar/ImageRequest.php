<?php
/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

/**
 * Request to the gravatar.com for image
 */
class ImageRequest extends AbstractRequest
{
    protected $path = "avatar";

    /**
     * Query query
     *
     * @var array
     */
    protected $query = [
        'size' => '',
        'default-image' => '',
        'force-default' => false,
        'rating' => ''
    ];

    public function withAccount(Account $account)
    {
        $imageRequest = clone $this;
        $imageRequest->account = $account;
        return $imageRequest;
    }

    public function withJpg()
    {
        $imageRequest = clone $this;
        $imageRequest->type = 'jpg';
        return $imageRequest;
    }

    public function withPng()
    {
        $imageRequest = clone $this;
        $imageRequest->type = 'png';
        return $imageRequest;
    }

    public function withSize($size)
    {
        $imageRequest = clone $this;
        $imageRequest->query['size'] = $size;
        return $imageRequest;
    }

    public function withDefaultImage($url)
    {
        $imageRequest = clone $this;
        $imageRequest->query['default-image'] = $url;
        return $imageRequest;
    }

    public function withForceDefault()
    {
        $imageRequest = clone $this;
        $imageRequest->query['force-default'] = true;
        return $imageRequest;
    }

    public function withRating($rating)
    {
        $imageRequest = clone $this;
        $imageRequest->query['rating'] = $rating;
        return $imageRequest;
    }

    public function getUri()
    {
        return new Uri(sprintf("%s%s%s",
            parent::getUri(),
            $this->path,
            $this->getQuery()
        ));
    }

    public function __toString()
    {
        return $this->getUri()->__toString();
    }

    public function getQuery()
    {
        $query = [];
        foreach ($this->query as $param => $value) {
            $query[] = \sprintf("%s=%s", $param, $value);
        }
        $queryString = \join($query, "&");
        return ($queryString != "") ? \sprintf("?%s", $queryString) : "";
    }

}
