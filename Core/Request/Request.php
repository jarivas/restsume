<?php

namespace Core\Request;

use Core\Configuration;
use Core\Response;
use Core\Authentication;
use Exception;

abstract class Request
{
    /**
     *
     * @var array
     */
    protected static array $data;

    /**
     *
     * @var array
     */
    protected static array $headers;

    abstract public static function process(): string;

    protected static function getUrlParams(): array
    {
        $urlParams = explode('?', $_SERVER['REQUEST_URI']);

        return array_slice(explode('/', $urlParams[0]), 1);;
    }

    protected static function getModuleAction(): string
    {
        $module = self::$data['module'];
        $action = self::$data['action'];

        if (!Configuration::validateModuleAction($module, $action)) {
            throw new Exception('Wrong Module and/or Action', Response::WARNING_BAD_REQUEST);
        }

        if (Configuration::shouldAuth($module, $action)) {
            if (!Authentication::isValid()) {
                throw new Exception('Wrong login credentials', Response::WARNING_UNAUTHORIZED);
            }
        }

        $module = ucfirst($module);
        $action = ucfirst($action);

        return "Api\\Modules\\$module\\$action::process";
    }

    protected static function getResponse(): string
    {
        $callable = self::getModuleAction();

        return $callable(self::$data['parameters']);
    }

    public static function getHeaders(): array
    {
        if (empty(self::$headers)) {
            $headers = [];

            foreach ($_SERVER as $k => $v) {
                if (substr($k, 0, 5) == 'HTTP_'){
                    $headers[strtolower(substr($k,5))] = $v;
                }
            }
            self::$headers = $headers;
        }

        return self::$headers;
    }
}
