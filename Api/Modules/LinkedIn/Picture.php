<?php

namespace Api\Modules\LinkedIn;

use Core\Db\Filesystem;
use Core\Action;

class Picture extends Action
{
    use Filesystem;
    use Store;

    public static function process(array $params): string
    {
        $lang = $params['lang'];
        $picture = $params['picture'];
        $store = self::$name . '-' . $lang;

        $params = json_decode(self::read($store), true);

        $params['profile']['profilePicture'] = $picture;

        $params = array_replace_recursive(self::$structure, $params);

        $result = self::save($store, json_encode($params, JSON_PRETTY_PRINT));

        return ($result) ?? '';
    }
}
