<?php

abstract class CtrlThemeFourDd extends CtrlThemeFour {

  protected function id() {
    return $this->req->rq('id');
  }

  protected function getStrName() {
    return $this->themeFourModule();
  }

  protected function getParamActionN() {
    return 0;
  }

  function action_default() {
    $this->d['layout'] = 'cols2';
    $this->d['blocksTpl'] = 'empty';
    $this->d['tpl'] = 'bookmarkContent';
  }

}