<?php

namespace Api\Modules\LinkedIn;

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

        $result = self::save(self::$name . '-' . $lang, json_encode($params));

        return ($result) ?? '';
    }
}
