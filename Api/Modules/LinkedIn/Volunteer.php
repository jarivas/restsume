<?php


namespace Api\Modules\LinkedIn;

trait Volunteer
{
    protected static function getVolunteer(array &$params): array
    {
        $result = [];

        if(empty($params['volunteerExperienceView'])) {
            return $result;
        }

        foreach ($params['volunteerExperienceView'] as $position) {
            $result[] = [
                'company' => $position['companyName'] ?? null,
                'position' => $position['role'] ?? null,
                'website' => '',
                'startDate' => $position['startMonthYear'] ?? null,
                'endDate' => $position['endMonthYear'] ?? null,
                'summary' => $position['description'] ?? null,
                'highlights' => null
            ];
        }

        return $result;
    }
}