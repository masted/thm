<?php

abstract class CtrlThemeFourDefault extends CtrlThemeFour {

  protected function id() {
    return $this->req->rq('id');
  }

  protected function getStrName() {
    return $this->themeFourModule();
  }

  protected function getParamActionN() {
    return 0;
  }

}