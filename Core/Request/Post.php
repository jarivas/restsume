<?php

namespace Core\Request;

use Core\Response;
use Core\Logger;
use Exception;

class Post extends Request
{

    public static function process(): string
    {        
        self::setRequestData(file_get_contents('php://input'), self::getUrlParams());

        return parent::getResponse();
    }

    protected static function setRequestData(string $body, array $urlParams)
    {
        $params = [];

        if (empty($urlParams[0])) {
            throw new Exception('Module is required', Response::WARNING_BAD_REQUEST);
        }

        if (empty($urlParams[1])) {
            throw new Exception('Action is required', Response::WARNING_BAD_REQUEST);
        }

        if ($urlParams[1] !== 'read') {
            if (empty($body)) {
                throw new Exception('Empty body on update action', Response::WARNING_BAD_REQUEST);
            }

            $params = json_decode($body, true);

            if (empty($params)) {
                Logger::info($body);

                throw new Exception('JSON not well formed', Response::WARNING_BAD_REQUEST);
            }
        }

        $params['lang'] = $urlParams[2];

        parent::$data = [
            'module' => $urlParams[0],
            'action' => $urlParams[1],
            'parameters' => $params
        ];
    }
}
