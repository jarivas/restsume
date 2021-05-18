<?php


namespace Api\Modules\LinkedIn;


trait Awards
{
    protected static function getAwards(array &$params): array
    {
        $result = [];

        if(empty($params['honorView'])) {
            return $result;
        }

        foreach ($params['honorView'] as $honor) {

            $result[] = [
                    'title' => $honor['title'] ?? null,
                    'date' =>  $honor['issueDate'] ?? null,
                    'awarder' => $honor['issuer'] ?? null,
                    'summary' => $honor['description'] ?? null,
                ];
        }

        return $result;
    }
}