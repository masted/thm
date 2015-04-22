<?php

class ThmFourRouter extends DefaultRouter {

  static public function isMobile() {
    if ($_SERVER['HTTP_HOST'] == '192.168.0.100:888') return true;
    return Misc::hasPrefix('m.', $_SERVER['HTTP_HOST']);
  }

  protected function getFrontendName() {
    return ThmFourRouter::isMobile() ? 'mobile' : 'default';
  }

}