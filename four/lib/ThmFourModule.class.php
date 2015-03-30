<?php

class ThmFourModule {

  static protected $rounters = [];

  static function init($name, $baseParam = null) {
    self::$rounters[$baseParam] = ucfirst($name).'Router';
    Ngn::addBasePath(NGN_ENV_PATH.'/thm-modules/'.$name, 4, $name);
  }

  static function router() {
    $req = O::get('Req');
    $firstParam = (isset($req->params[0]) and isset(self::$rounters[$req->params[0]])) ? $req->params[0] : null;
    $class = self::$rounters[$firstParam];
    if ($firstParam) {
      return new $class([
        'originalReq' => $req,
        'req' => new Req(['uri' => Misc::removePrefix('/'.$firstParam, $req->options['uri'])])
      ]);
    } else {
      return new $class;
    }
  }

}