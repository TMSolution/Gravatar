<?php

/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

/**
 * Gravatar profile
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
class Profile implements ProfileInterface
{

    /**
     * Response data
     * 
     * @var array 
     */
    protected $responseData = [
        "id" => "",
        "hash" => "",
        "requestHash" => "",
        "profileUrl" => "",
        "preferredUsername" => "",
        "thumbnailUrl" => "",
        "aboutMe" => "",
        "currentLocation" => "",
        "displayName" => "",        
        "emails" => [],
        "name" => [
            "familyName" => "",
            "formatted" => "",
            "givenName" => "",
        ],
        "ims" => [],
        "currency" => [],
        "photos" => [],
        "phoneNumbers" => [],
        "profileBackground" => [],
        "urls" => [],
    ];
    
    /**
     * Gravatar profile
     * 
     * @param Response $response Response from Gravatar profile
     */
    public function __construct(Response $response)
    {
        $this->responseData = \array_merge(
            $this->responseData,
            \unserialize($response->getBody())["entry"][0]
        );
    }

    public function getId()
    {
        return $this->responseData["id"];
    }

    public function getHash()
    {
        return $this->responseData["hash"];
    }

    public function getRequestHash()
    {
        return $this->responseData["requestHash"];
    }

    public function getProfileUrl()
    {
        return $this->responseData["profileUrl"];
    }

    public function getPreferredUserName()
    {
        return $this->responseData["preferredUsername"];
    }

    public function getThumbnailUrl()
    {
        return $this->responseData["thumbnailUrl"];
    }

    public function getAboutMe()
    {
        return $this->responseData["aboutMe"];
    }

    public function getCurrentLocation()
    {
        return $this->responseData["currentLocation"];
    }

    public function getDisplayName()
    {
        return $this->responseData["displayName"];
    }

    public function getPrimaryEmail()
    {
        foreach ($this->responseData["emails"] as $email) {
            if ($email["primary"] == true) {
                return $email["value"];
            }
        }
        return "";
    }

    public function getEmails()
    {
        foreach ($this->responseData["emails"] as $index => $email) {
            yield $index => $email["value"];
        }
    }

    public function getFamilyName()
    {
        return $this->responseData["name"]["familyName"];
    }

    public function getFormattedName()
    {
        return $this->responseData["name"]["formatted"];
    }

    public function getGivenName()
    {
        return $this->responseData["name"]["givenName"];
    }

    public function getIms()
    {
        foreach ($this->responseData["ims"] as $im) {
            yield $im["type"] => $im["value"];
        }
    }

    public function getCurrencies()
    {
        foreach ($this->responseData["currency"] as $currency) {
            yield $currency["type"] => $currency["value"];
        }
    }

    
    public function getPhotos()
    {
        foreach ($this->responseData["photos"] as $index => $photo) {
            yield $index => $photo["value"];
        }
    }

    public function getThumbnailPhoto()
    {
        foreach ($this->responseData["photos"] as $photo) {
            if (isset($photo["type"]) && $photo["type"] === "thumbnail") {
                return $photo["value"];
            }
        }
        return "";
    }
    
    public function getPhoneNumbers()
    {
        foreach ($this->responseData["phoneNumbers"] as $phone) {
            yield $phone["type"] => $phone["value"];
        }
    }
    
    public function getProfileBackground()
    {
        foreach ($this->responseData["profileBackground"] as $type => $background) {
            yield $type => $background;
        }
    }

    public function getUrls()
    {
        foreach ($this->responseData["urls"] as $im) {
            yield $im["title"] => $im["value"];
        }
    }

}
