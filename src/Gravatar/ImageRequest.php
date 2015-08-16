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
     * Get new ImageRequest for the accout
     * 
     * @param Account Account
     * @return ImageRequest ImageRequest for the account
     */        
    public function withAccount(Account $account)
    {
        $imageRequest = clone $this;
        $imageRequest->account = $account;
        return $imageRequest;
    }

    /**
     * Get new ImageRequest with jpg extension
     * 
     * @return ImageRequest ImageRequest with default image url
     */        
    public function withJpg()
    {
        $imageRequest = clone $this;
        $imageRequest->type = 'jpg';
        return $imageRequest;
    }

    /**
     * Get new ImageRequest with png extension
     * 
     * @return ImageRequest ImageRequest with default image url
     */        
    public function withPng()
    {
        $imageRequest = clone $this;
        $imageRequest->type = 'png';
        return $imageRequest;
    }

    /**
     * Get new ImageRequest with image size
     * 
     * @param string $size Image size
     * @return ImageRequest ImageRequest with image size
     */    
    public function withSize($size)
    {
        $imageRequest = clone $this;
        $imageRequest->query['size'] = $size;
        return $imageRequest;
    }

    /**
     * Get new ImageRequest with default image url
     * 
     * @param string $url Image url
     * @return ImageRequest ImageRequest with default image url
     */    
    public function withDefaultImage($url)
    {
        $imageRequest = clone $this;
        $imageRequest->query['default-image'] = $url;
        return $imageRequest;
    }

    /**
     * Get new ImageRequest with force default option
     * 
     * @return ImageRequest ImageRequest with rating
     */    
    public function withForceDefault()
    {
        $imageRequest = clone $this;
        $imageRequest->query['force-default'] = true;
        return $imageRequest;
    }
    
    /**
     * Get new ImageRequest with rating
     * 
     * @param string $rating Image rating
     * @return ImageRequest ImageRequest with rating
     */
    public function withRating($rating)
    {
        $imageRequest = clone $this;
        $imageRequest->query['rating'] = $rating;
        return $imageRequest;
    }
    
}
