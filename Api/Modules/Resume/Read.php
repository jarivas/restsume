<?php

namespace Api\Modules\Resume;

use Core\Db\Filesystem;
use Core\Action;

class Read extends Action
{
    use Filesystem;
    use Store;

    public static function process(array $params): string
    {
        return self::read(self::$name . '-' . $params['lang']);
    }
}
