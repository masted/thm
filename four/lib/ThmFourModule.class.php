<?php

class ThmFourModule {

  static $names = [], $basePaths = [];

  static function init($name, $baseParam = null) {
    self::$names[$baseParam] = $name;
    self::$basePaths[$name] = $baseParam;
    Ngn::addBasePath(NGN_ENV_PATH.'/thm-four-modules/'.$name);
  }

}