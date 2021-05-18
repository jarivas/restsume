<?php


namespace Api\Modules\LinkedIn;


trait Skills
{
    protected static function getSkills(array &$params): array
    {
        $result = [];

        if(empty($params['skillView'])) {
            return $result;
        }

        foreach ($params['skillView'] as $skill) {

            $result[] = [
                'name' => $skill['name'],
                'level' => null,
                'keywords' => [
                    $skill['name']
                ]
            ];
        }

        return $result;
    }
}