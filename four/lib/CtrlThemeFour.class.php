<?php

abstract class CtrlThemeFour extends CtrlCommon {

  abstract protected function themeFourModule();

  /**
   * @return Req
   */
  public function originalReq() {
    return isset($this->router->options['originalReq']) ? $this->router->options['originalReq'] : $this->req;
  }

  protected function init() {
    $this->d['basePath'] = ThmFourModule::$basePaths[$this->themeFourModule()];
    if ($this->d['basePath']) $this->d['basePath'] = '/'.$this->d['basePath'];
    else $this->d['basePath'] = '';
    $this->d['layout'] = 'cols1';
    Sflm::frontend('css')->addLib('icons');
    Sflm::frontend('css')->addFolder(WEBROOT_PATH.'/m/css');
    Sflm::frontend('css')->addFolder(NGN_ENV_PATH.'/thm/four/thm/css');
    Sflm::frontend('css')->addFolder(NGN_ENV_PATH.'/thm-four-modules/'.$this->themeFourModule().'/m/css');
    Sflm::frontend('js')->addLib('m/js/init.js');
    $this->d['mobile'] = Misc::hasPrefix('m.', $_SERVER['HTTP_HOST']);
  }

  protected function afterAction() {
    if ($this->d['mobile']) $this->d['layout'] = 'cols1';
  }

}