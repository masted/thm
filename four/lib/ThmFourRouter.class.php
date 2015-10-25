<?php

class ThmFourRouter extends DefaultRouter {

  static function thumbUrl($path, $x, $y) {
    return '/u/thumb/'.dirname($path).'/'.$x.'x'.$y.'/'.basename($path);
  }

  function _getController() {
    if (preg_match('/^u\\/thumb\\/(.+)\\/(\d+)x(\d+)\\/([^\\/]+)/', $this->req->path, $m)) {
      // thumbs generation
      $destPath = UPLOAD_PATH.'/'.Misc::removePrefix('u/', $this->req->path);
      Dir::make(dirname($destPath));
      (new Image)->resizeAndSave(UPLOAD_PATH.'/'.$m[1].'/'.$m[4], $destPath, $m[2], $m[3]);
      redirect('/'.$this->req->path);
      die();
    }
    $homeProjectControllerClass = 'Ctrl'.ucfirst(PROJECT_KEY).'Home';
    if (!isset($this->req->params[0]) and class_exists($homeProjectControllerClass)) {
      return new $homeProjectControllerClass($this);
    }
    if (isset($this->req->params[0]) and $this->req->params[0] == 'profile') {
      return new CtrlThmFourProfile($this);
    }
    $class = $this->getControllerClass();
    if ($class == 'CtrlDefault') throw new NotLoggableError('ThmFour: CtrlDefault is not supported');
    return parent::_getController();
  }

}
