<?php

namespace Api\Modules\Resume;

use Core\Db\Filesystem;
use Core\Action;

class Update extends Action
{
    use Filesystem;
    use Store;

    public static function process(array $params): string
    {
        $lang = $params['lang'];

        unset($params['lang']);

        $params = array_replace_recursive(self::$structure, $params);

        $result = self::save(self::$name . '-' . $lang, json_encode($params));

        return ($result) ?? '';
    }
}
