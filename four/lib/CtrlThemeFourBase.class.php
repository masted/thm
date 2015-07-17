<?php

abstract class CtrlThemeFourBase extends CtrlDefault {

  protected function init() {
    $this->d['footer'] = Config::getVarVar('layoutTexts', 'footer');
  }

}