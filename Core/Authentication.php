<?php

namespace Core;

use Core\Configuration;
use Core\Request\Request;

class Authentication
{
    public static function isValid(): bool
    {
        $header = Request::getHeaders();

        if(empty($header['user']) || empty($header['password'])) {
            return false;
        }

        $login = Configuration::getData('login');

        if(empty($login['user']) || empty($login['password'])) {
            return false;
        }

        return (($header['user'] == $login['user']) && ($header['password'] == $login['password']));
    }
}
