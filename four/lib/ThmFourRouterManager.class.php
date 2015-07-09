<?php

class ThmFourRouterManager extends RouterManager {

  protected function getDefaultRouter() {
    $req = O::get('Req');
    $firstParam = null;
    if (isset($req->params[0])) {
      if ($req->params[0] == 'profile' or $req->params[0] == 'home') {
        return new ThmFourRouter;
      }
      if (isset(ThmFourModule::$names[$req->params[0]])) {
        $firstParam = $req->params[0];
      }
    }
    if (!$firstParam) return new ThmFourRouter;
    $fourModule = ThmFourModule::$names[$firstParam];
    Ngn::addBasePath(NGN_ENV_PATH.'/thm-four-modules/'.$fourModule, 4, $fourModule);
    $routerClass = ucfirst($fourModule).'Router';
    if (!class_exists($routerClass)) $routerClass = 'ThmFourRouter';
    if ($firstParam) {
      return new $routerClass([
        'originalReq' => $req,
        'req' => new Req(['uri' => Misc::removePrefix('/'.$firstParam, $req->options['uri'])])
      ]);
    } else {
      return new $routerClass;
    }
  }

}