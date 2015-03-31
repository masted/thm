<?php

class ThmFourRouterManager extends RouterManager {

  protected function getDefaultRouter() {
    $req = O::get('Req');
    $firstParam = (isset($req->params[0]) and isset(ThmFourModule::$names[$req->params[0]])) ? $req->params[0] : null;
    foreach (ThmFourModule::$names as $fourModule) {
      Lib::addFolder(NGN_ENV_PATH.'/thm-modules/'.$fourModule.'/lib');
    }
    $fourModule = ThmFourModule::$names[$firstParam];
    Ngn::addBasePath(NGN_ENV_PATH.'/thm-modules/'.$fourModule, 4, $fourModule);
    $routerClass = ucfirst($fourModule).'Router';
    if (!class_exists($routerClass)) $routerClass = 'DefaultRouter';
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