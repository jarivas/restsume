<?php


namespace Api\Modules\LinkedIn;


trait Publications
{
    protected static function getPublications(array &$params): array
    {
        $result = [];

        if(empty($params['publicationView'])) {
            return $result;
        }

        foreach ($params['publicationView'] as $publication) {

            $result[] = [
                    'name' => $publication['name'] ?? null,
                    'publisher' => $publication['publisher'] ?? null,
                    'releaseDate' => $publication['date'] ?? null,
                    'website' => $publication['url'] ?? null,
                    'summary' => $publication['description'] ?? null,
                ];
        }

        return $result;
    }
}