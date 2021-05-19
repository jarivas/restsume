<?php


namespace Api\Modules\LinkedIn;

trait Store
{
    protected static string $name = 'linkedIn';

    protected static array $structure = [
        'patentView' => [
        ],
        'educationView' => [
            [
                'timePeriod' => '2008 - 2009',
                'description' => 'Sun Certified Java Programmer (JAVA 5)',
                'degreeName' => 'J2EE Technology expert',
                'schoolName' => 'Forman',
                'fieldOfStudy' => 'Computer Software Engineering',
            ],
        ],
        'organizationView' => [
        ],
        'projectView' => [
        ],
        'positionView' => [
            [
                'timePeriod' => '2019.10 - ',
                'description' => 'PHP 7, Go, Microservices, API Integrations',
                'company' => 'asd',
            ]
        ],
        'profile' => [
            'lastName' => 'asd',
            'student' => false,
            'headline' => 'Fullstack developer, certified.NET and Java developer, and script languages lover',
            'summary' => 'Passionate for new cutting edge technology, open source spirited and everyday learner.',
            'industryName' => 'Internet',
            'address' => 'Cliuhheim',
            'locationName' => 'Malaga, Andalusia, Spain',
            'geoCountryName' => 'Spain',
            'firstName' => 'asd',
            'profilePicture' => 'asd',
            'geoLocationName' => 'Andalusia',
        ],
        'languageView' => [
            [
                'name' => 'English',
                'proficiency' => 'FULL_PROFESSIONAL',
            ]
        ],
        'certificationView' => [
            [
                'authority' => 'Code School',
                'name' => 'Anatomy of Backbone.js',
                'displaySource' => 'codeschool.com',
                'url' => 'https://www.codeschool.com/courses/anatomy-of-backbone-js',
            ]
        ],
        'testScoreView' => [
        ],
        'volunteerCauseView' => [
        ],
        'courseView' => [
            [
                'name' => 'Html5 Css3 Course',
                'number' => '',
            ]
        ],
        'honorView' => [
        ],
        'skillView' => [
            [
                'name' => 'Java',
            ],
        ],
        'volunteerExperienceView' => [
        ],
        'publicationView' => [
        ],
        'profileContactInfo' => [
            'emailAddress' => 'me@asd.work',
            'websites' => [
                0 => [
                    'url' => 'https://github.com/asd',
                ],
            ],
            'primaryTwitterHandle' => [
                'name' => 'account',
            ],
            'phoneNumbers' => [
                0 => [
                    'type' => 'MOBILE',
                    'number' => '123456789',
                ],
            ],
            'ims' => [
                0 => [
                    'provider' => 'GTALK',
                    'id' => 'asd@gmail.com',
                ],
            ],
        ],
    ];
}