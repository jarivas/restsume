<?php


namespace Api\Modules\LinkedIn;


trait Languages
{
    protected static function getLanguages(array &$params): array
    {
        $result = [];

        if(empty($params['languageView'])) {
            return $result;
        }

        foreach ($params['languageView'] as $language) {
            $result[] = [
                'language' => $language['name'],
                'fluency' => $language['proficiency'],
            ];
        }

        return $result;
    }
}