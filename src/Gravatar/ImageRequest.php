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
    /**
     * Query paramaters
     *
     * @var array Query parameters
     */
    protected $query = [
        'size' => '',
        'default-image' => '',
        'force-default' => false,
        'rating' => ''
    ];

    /**
     * Get request URI
     * 
     * @return string Request URI
     */
    public function __toString()
    {
        return $this->getUri()->__toString();
    }

    /**
     * Get path of request URI
     * 
     * @return string Path of request URI
     */
    public function getPath()
    {
        return "avatar/" . parent::getPath();
    }

    /**
     * Get size of the Gravatar image
     * 
     * @return int Size of the Gravatar image
     */
    public function getSize()
    {
        return $this->query['size'];
    }
    
    public function getForceDefault()
    {
        return $this->query['force-default'];
    }
    
    public function getRating()
    {
        return $this->query['rating'];
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
    
}
