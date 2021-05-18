<?php


namespace Api\Modules\LinkedIn;

trait Work
{
    protected static function getWork(array &$params): array
    {
        $result = [];

        if(empty($params['positionView'])) {
            return $result;
        }

        foreach ($params['positionView'] as $position) {
            $timePeriod = explode(' - ', $position['timePeriod']);

            $result[] = [
                'company' => $position['company'] ?? $position['companyName'] ?? null,
                'position' => $position['title'] ?? $position['description'] ?? null,
                'website' => null,
                'startDate' => $timePeriod[0],
                'endDate' => trim($timePeriod[1]),
                'summary' => $position['description'] ?? null,
                'highlights' => [
                ],
            ];
        }

        return $result;
    }
}