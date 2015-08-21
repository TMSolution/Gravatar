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
     * @param Response $response Response from gravatar.com
     */
    public function __construct(Response $response)
    {
        $this->responseData = \array_merge(
                $this->responseData, \unserialize($response->getBody())["entry"][0]
        );
    }

    /**
     * Get profile id
     * 
     * @return string Profile id
     */
    public function getId()
    {
        return $this->responseData["id"];
    }

    /**
     * Get profile hash
     * 
     * @return string Hash
     */
    public function getHash()
    {
        return $this->responseData["hash"];
    }

    /**
     * Get requested hash
     * 
     * @return string Request hash
     */
    public function getRequestHash()
    {
        return $this->responseData["requestHash"];
    }

    /**
     * Get profile URL
     * 
     * @return string Profile URL
     */
    public function getProfileUrl()
    {
        return $this->responseData["profileUrl"];
    }

    /**
     * Get preffered name
     * 
     * @return string Preferred user name
     */
    public function getPreferredUserName()
    {
        return $this->responseData["preferredUsername"];
    }

    /**
     * Get thumbnail URL
     * 
     * @return string Thumbnail Url
     */
    public function getThumbnailUrl()
    {
        return $this->responseData["thumbnailUrl"];
    }

    /**
     * Get info about profile user
     * 
     * @return string Info about profile user
     */
    public function getAbout()
    {
        return $this->responseData["aboutMe"];
    }

    /**
     * Get location
     * 
     * @return string User location
     */    
    public function getCurrentLocation()
    {
        return $this->responseData["currentLocation"];
    }

    /**
     * Get display name
     * 
     * @return string User display name
     */    
    public function getDisplayName()
    {
        return $this->responseData["displayName"];
    }

    /**
     * Get primary email
     * 
     * @return string User primary email
     */
    public function getPrimaryEmail()
    {
        foreach ($this->responseData["emails"] as $email) {
            if ($email["primary"] == true) {
                return $email["value"];
            }
        }
        return "";
    }

    /**
     * Get emails
     * 
     * @return \Generator User emails
     */
    public function getEmails()
    {
        foreach ($this->responseData["emails"] as $index => $email) {
            yield $index => $email["value"];
        }
    }

    /**
     * Get family name
     * 
     * @return string User family name
     */    
    public function getFamilyName()
    {
        return $this->responseData["name"]["familyName"];
    }

    /**
     * Get formatted name
     * 
     * @return string User formatted name
     */    
    public function getFormattedName()
    {
        return $this->responseData["name"]["formatted"];
    }

    /**
     * Get given name
     * 
     * @return string User given name
     */
    public function getGivenName()
    {
        return $this->responseData["name"]["givenName"];
    }

    /**
     * Get ims
     * 
     * @return \Generator User ims
     */    
    public function getIms()
    {
        foreach ($this->responseData["ims"] as $im) {
            yield $im["type"] => $im["value"];
        }
    }

    /**
     * Get currencies
     * 
     * @return \Generator User currencies
     */
    public function getCurrencies()
    {
        foreach ($this->responseData["currency"] as $currency) {
            yield $currency["type"] => $currency["value"];
        }
    }

    /**
     * Get photos
     * 
     * @return \Generator User photos
     */
    public function getPhotos()
    {
        foreach ($this->responseData["photos"] as $index => $photo) {
            yield $index => $photo["value"];
        }
    }

    /**
     * Get thumbnail photo
     * 
     * @return string Profile thumbnail photo
     */
    public function getThumbnailPhoto()
    {
        foreach ($this->responseData["photos"] as $photo) {
            if (isset($photo["type"]) && $photo["type"] === "thumbnail") {
                return $photo["value"];
            }
        }
        return "";
    }

    /**
     * Get phone numbers
     * 
     * @return \Generator User phone numbers
     */
    public function getPhoneNumbers()
    {
        foreach ($this->responseData["phoneNumbers"] as $phone) {
            yield $phone["type"] => $phone["value"];
        }
    }

    /**
     * Get backgrounds
     * 
     * @var \Generator Profile backgrounds
     */
    public function getProfileBackgrounds()
    {
        foreach ($this->responseData["profileBackground"] as $type => $background) {
            yield $type => $background;
        }
    }

    /**
     * Get URL's
     * 
     * @return \Generator User URL's
     */
    public function getUrls()
    {
        foreach ($this->responseData["urls"] as $im) {
            yield $im["title"] => $im["value"];
        }
    }

}
