<?php


namespace Api\Modules\LinkedIn;


trait Basics
{
    protected static function getBasics(array &$params): array
    {
        $profile = $params['profile'];
        $contactInfo = $params['profileContactInfo'];

        return [
            'name' => $profile['firstName'] . ' ' . $profile['lastName'],
            'label' => $profile['headline'],
            'picture' => null,
            'email' => $contactInfo['emailAddress'],
            'phone' => self::getPhones($contactInfo['phoneNumbers']),
            'website' => self::getWebsites($contactInfo['websites']),
            'summary' => $profile['summary'],
            'location' => self::getBasicsLocation($profile),
            'profiles' => self::getBasicsProfiles($contactInfo),
        ];
    }

    protected static function getPhones(array $phoneNumbers): string
    {
        $result = '';

        if (empty($phoneNumbers)) {
            return $result;
        }

        foreach ($phoneNumbers as $phoneNumber) {
            $result .= $phoneNumber['type'] . ': ' . $phoneNumber['number'] . ' |';
        }

        return $result;
    }

    protected static function getWebsites(array $websites): string
    {
        $result = '';

        if (empty($websites)) {
            return $result;
        }

        foreach ($websites as $website) {
            $result .= $website['url'] . ' |';
        }

        return $result;
    }

    protected static function getBasicsLocation(array &$profile): array
    {
        return [
            'address' => $profile['address'] ?? null,
            'postalCode' => null,
            'city' => $profile['locationName'] ?? null,
            'countryCode' => $profile['geoCountryName'] ?? null,
            'region' => $profile['locationName'] ?? null,
        ];
    }

    protected static function getBasicsProfiles(array &$contactInfo): array
    {
        $result = [];

        if(!empty($contactInfo['primaryTwitterHandle'])) {
            $result[] = self::getTwitterProfile($contactInfo);
        }

        if(!empty($contactInfo['ims'])) {
            foreach ($contactInfo['ims'] as $ims) {
                $result[] = [
                    'network' => $ims['provider'],
                    'username' => $ims['id'],
                    'url' => $ims['provider'],
                ];
            }
        }

        return $result;
    }

    protected static function getTwitterProfile(array &$contactInfo): array
    {
        $user = $contactInfo['primaryTwitterHandle']['name'];

        return [
            'network' => 'Twitter',
            'username' => $user,
            'url' => "http://twitter.com/$user",
        ];
    }
}