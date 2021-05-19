<?php

namespace Api\Modules\LinkedIn;

use Core\Db\Filesystem;
use Core\Action;
use Api\Modules\Resume\Store;

class Convert extends Action
{
    use Filesystem;
    use Store;
    use Basics;
    use Work;
    use Volunteer;
    use Education;
    use Awards;
    use Publications;
    use Skills;
    use Languages;

    public static function process(array $params): string
    {
        $result = Update::process($params);

        if (!$result) {
            return $result;
        }

        $lang = $params['lang'];

        unset($params['lang']);

        $resume = [
            'basics' => self::getBasics($params),
            'work' => self::getWork($params),
            'volunteer' => self::getVolunteer($params),
            'education' => self::getEducation($params),
            'awards' => self::getAwards($params),
            'publications' => self::getPublications($params),
            'skills' => self::getSkills($params),
            'languages' => self::getLanguages($params),
            'interests' => null,
            'references' => null
        ];

        $params = array_replace_recursive(self::$structure, $params);

        $result = self::save(self::$name . '-' . $lang, json_encode($resume));

        return ($result) ?? '';
    }
}
