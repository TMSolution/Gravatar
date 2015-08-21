<?php

/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Gravatar;

/**
 * Gravatar profile interface
 *
 * @author Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 */
interface ProfileInterface
{

    /**
     * Get profile id
     * 
     * @return string Profile id
     */
    public function getId();

    /**
     * Get profile hash
     * 
     * @return string Hash
     */
    public function getHash();

    /**
     * Get requested hash
     * 
     * @return string Request hash
     */
    public function getRequestHash();

    /**
     * Get profile URL
     * 
     * @return string Profile URL
     */
    public function getProfileUrl();

    /**
     * Get preffered name
     * 
     * @return string Preferred user name
     */
    public function getPreferredUserName();

    /**
     * Get thumbnail URL
     * 
     * @return string Thumbnail Url
     */
    public function getThumbnailUrl();

    /**
     * Get photos
     * 
     * @return \Generator User photos
     */
    public function getPhotos();

    /**
     * Get thumbnail photo
     * 
     * @return string Profile thumbnail photo
     */
    public function getThumbnailPhoto();

    /**
     * Get backgrounds
     * 
     * @var \Generator Profile backgrounds
     */
    public function getProfileBackgrounds();

    /**
     * Get given name
     * 
     * @return string User given name
     */
    public function getGivenName();

    /**
     * Get family name
     * 
     * @return string User family name
     */
    public function getFamilyName();

    /**
     * Get formatted name
     * 
     * @return string User formatted name
     */
    public function getFormattedName();

    /**
     * Get display name
     * 
     * @return string User display name
     */
    public function getDisplayName();

    /**
     * Get info about user
     * 
     * @return string Info about user
     */
    public function getAbout();

    /**
     * Get location
     * 
     * @return string User location
     */
    public function getCurrentLocation();

    /**
     * Get primary email
     * 
     * @return string User primary email
     */
    public function getPrimaryEmail();

    /**
     * Get emails
     * 
     * @return \Generator User emails
     */
    public function getEmails();

    /**
     * Get ims
     * 
     * @return \Generator User ims
     */
    public function getIms();

    /**
     * Get URL's
     * 
     * @return \Generator User URL's
     */
    public function getUrls();

    /**
     * Get phone numbers
     * 
     * @return \Generator User phone numbers
     */
    public function getPhoneNumbers();

    /**
     * Get currencies
     * 
     * @return \Generator User currencies
     */
    public function getCurrencies();
}
