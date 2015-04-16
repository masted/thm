<?php

class ThmFourRouter extends DefaultRouter {

  static public function isMobile() {
    return Misc::hasPrefix('m.', $_SERVER['HTTP_HOST']);
  }

  protected function getFrontendName() {
    return ThmFourRouter::isMobile() ? 'mobile' : 'default';
  }

}