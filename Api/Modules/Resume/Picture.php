<?php

namespace Api\Modules\Resume;

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

        $params['basics']['picture'] = $picture;

        $params = array_replace_recursive(self::getStructure(), $params);

        $result = self::save($store, json_encode($params, JSON_PRETTY_PRINT));

        return ($result) ?? '';
    }
}
