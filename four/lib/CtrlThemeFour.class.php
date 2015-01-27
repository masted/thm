<?php

class CtrlThemeFour extends CtrlCommon {

  protected function init() {
    $this->d['layout'] = 'cols1';
    Sflm::frontend('js')->addPath('m/js/site.js');
  }

}