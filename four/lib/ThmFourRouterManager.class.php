<?php

class ThmFourRouterManager extends RouterManager {

  protected function getDefaultRouter() {
    $req = O::get('Req');
    $firstParam = (isset($req->params[0]) and isset(ThmFourModule::$routers[$req->params[0]])) ? $req->params[0] : null;
    $class = ThmFourModule::$routers[$firstParam];
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