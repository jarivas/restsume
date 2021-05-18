<?php


namespace Api\Modules\LinkedIn;

trait Education
{
    protected static function getEducation(array &$params): array
    {
        $result = [];

        foreach ($params['educationView'] as $education) {
            $timePeriod = explode(' - ', $education['timePeriod']);

            $result[] = [
                'institution' => $education['schoolName'],
                'area' => $education['fieldOfStudy'],
                'studyType' => $education['degreeName'],
                'startDate' => $timePeriod[0],
                'endDate' => $timePeriod[1],
                'gpa' => null,
                'courses' => [
                    $education['description']
                ]
            ];
        }

        foreach ($params['certificationView'] as $education) {
            $result[] = [
                'institution' => $education['authority'],
                'area' => $education['displaySource'],
                'studyType' => $education['name'],
                'startDate' => null,
                'endDate' => null,
                'gpa' => null,
                'courses' => [
                    $education['url']
                ]
            ];
        }

        foreach ($params['courseView'] as $education) {
            $result[] = [
                'institution' => null,
                'area' => null,
                'studyType' => $education['name'],
                'startDate' => null,
                'endDate' => null,
                'gpa' => null,
                'courses' => null
            ];
        }

        return $result;
    }
}