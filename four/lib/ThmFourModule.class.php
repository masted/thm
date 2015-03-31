<?php

class ThmFourModule {

  static $routers = [];

  static function init($name, $baseParam = null) {
    self::$routers[$baseParam] = ucfirst($name).'Router';
    Ngn::addBasePath(NGN_ENV_PATH.'/thm-modules/'.$name, 4, $name);
  }

}