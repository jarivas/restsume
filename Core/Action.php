<?php

namespace Core;

abstract class Action {
    abstract public static function process(array $params): string;
}
