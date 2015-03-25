<?php

abstract class CtrlThemeFour extends CtrlCommon {

  protected function init() {
    $this->d['layout'] = 'cols1';
    Sflm::frontend('css')->addLib('icons');
    Sflm::frontend('css')->addFolder(WEBROOT_PATH.'/m/css');
    Sflm::frontend('css')->addFolder(NGN_ENV_PATH.'/thm/four/thm/css');
    Sflm::frontend('css')->addFolder(NGN_ENV_PATH.'/thm-modules/'.THM.'/m/css');
    $this->d['mobile'] = true;
    //$this->d['mobile'] = Misc::hasPrefix('m.', $_SERVER['HTTP_HOST']);
  }

  protected function afterAction() {
    if ($this->d['mobile']) $this->d['layout'] = 'cols1';
  }

}