<?php

abstract class CtrlThemeFourBase extends CtrlDefault {

  protected function init() {
    $this->d['mobile'] = ThmFourRouter::isMobile();
    $this->d['footer'] = Config::getVarVar('layoutTexts', 'footer');
  }

  protected function afterAction() {
    if (isset($this->d['blocksTpl']) and is_string($this->d['blocksTpl'])) {
      $this->d['blocksTpl'] = new TtTpl($this->tt, $this->d, ['path' => $this->d['blocksTpl']]);
    }
    if ($this->d['mobile']) $this->d['layout'] = 'mobile/inner';
  }

}