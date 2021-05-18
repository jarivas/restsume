<?php

namespace Core\Db;

use \Core\Configuration;

trait Filesystem
{
    public static function getFile(string $store): string
    {
        $db =  Configuration::getData('db');

        return ROOT_DIR . $db['data_folder'] . DIRECTORY_SEPARATOR . $store;
    }

    /**
     * @param string $store
     * @param string $data
     * @return false|int
     */
    public static function save(string $store, string $data)
    {
        $file = self::getFile($store);

        return file_put_contents($file, $data);
    }

    /**
     * @param string $store
     * @return string
     */
    public static function read(string $store) : string
    {
        $file = self::getFile($store);

        return (file_exists($file)) ? file_get_contents($file) : '';
    }
}