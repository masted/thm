<?php

class ThmFourModule {

  static $routers = [], $basePaths = [];

  static function init($name, $baseParam = null) {
    self::$routers[$baseParam] = ucfirst($name).'Router';
    self::$basePaths[$name] = $baseParam;
    Ngn::addBasePath(NGN_ENV_PATH.'/thm-modules/'.$name, 4, $name);
  }

}