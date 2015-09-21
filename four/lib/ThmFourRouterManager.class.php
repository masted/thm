<?php

class ThmFourRouterManager extends RouterManager {

  protected function getDefaultRouter() {
    $firstParam = null;
    if (isset($this->req->params[0])) {
      if ($this->req->params[0] == 'profile' or $this->req->params[0] == 'home') {
        return new ThmFourRouter($this->options['routerOptions']);
      }
      if (isset(ThmFourModule::$names[$this->req->params[0]])) {
        $firstParam = $this->req->params[0];
      }
    }
    if (!$firstParam) return new ThmFourRouter($this->options['routerOptions']);
    $fourModule = ThmFourModule::$names[$firstParam];
    Ngn::addBasePath(NGN_ENV_PATH.'/thm-four-modules/'.$fourModule, 4, $fourModule);
    $routerClass = ucfirst($fourModule).'Router';
    if (!class_exists($routerClass)) $routerClass = 'ThmFourRouter';
    if ($firstParam) {
      $this->options['routerOptions']['originalReq'] = $this->req;
      $this->options['routerOptions']['req'] = new Req([
        'uri' => Misc::removePrefix('/'.$firstParam, $this->req->options['uri'])
      ]);
      return new $routerClass($this->options['routerOptions']);
    } else {
      return new $routerClass($this->options['routerOptions']);
    }
  }

}