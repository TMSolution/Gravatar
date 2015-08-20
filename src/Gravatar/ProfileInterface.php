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
     * @return string Profile id
     */
    public function getId();
    
    /**
     * @return string Response hash
     */
    public function getHash();
    
    /**
     * @return string Request hash
     */
    public function getRequestHash();
    
    /**
     * @return string Profile URL
     */
    public function getProfileUrl();
    
    /**
     * @return string Preferred user name
     */
    public function getPreferredUserName();
    
    /**
     * @return string Thumbnail Url
     */
    public function getThumbnailUrl();
    
    /**
     * @return array Collection of photos
     */
    public function getPhotos();

    /**
     * @return string
     */
    public function getThumbnailPhoto();
    
    
    /**
     * @var array
     */
    public function getProfileBackground();
    
    /**
     * @return string
     */
    public function getGivenName();

    /**
     * @return string
     */    
    public function getFamilyName();
    
    /**
     * @return string
     */    
    public function getFormattedName();
    
    /**
     * @return string
     */    
    public function getDisplayName();
    
    /**
     * @return string
     */    
    public function getAboutMe();
    
    /**
     * @return string
     */    
    public function getCurrentLocation();

    /**
     * @return string
     */
    public function getPrimaryEmail();

    /**
     * @return \Generator
     */
    public function getEmails();

    /**
     * @return \Generator
     */    
    public function getIms();
    
    /**
     * @return \Generator
     */
    public function getUrls();
    
    /**
     * @return \Generator
     */
    public function getPhoneNumbers();
    
    /**
     * @return \Generator
     */
    public function getCurrencies();
    
}
