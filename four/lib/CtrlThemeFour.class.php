<?php

abstract class CtrlThemeFour extends CtrlThemeFourBase {

  abstract protected function themeFourModule();

  /**
   * @return Req
   */
  public function originalReq() {
    return isset($this->router->options['originalReq']) ? $this->router->options['originalReq'] : $this->req;
  }

  protected function extendByBasePath(array $links) {
    foreach ($links as &$v) $v['link'] = $this->d['basePath'].($v['link'] ? '/'.$v['link'] : '');
    return $links;
  }

  protected function init() {
    parent::init();
    $this->d['basePath'] = ThmFourModule::$basePaths[$this->themeFourModule()];
    if ($this->d['basePath']) $this->d['basePath'] = '/'.$this->d['basePath'];
    else $this->d['basePath'] = '';
    if (Auth::get('id')) {
      $this->d['profile'] = (new DdItems('profile'))->getItemByField('userId', Auth::get('id'));
    }
    Sflm::$absBasePaths['thm'] = NGN_ENV_PATH.'/thm/four/thm';
    $this->d['menu'] = Config::getVar('menu', true);
    if (!$this->d['mobile']) {
      $this->d['layout'] = 'cols1';
      Sflm::frontend('css')->addLib('icons');
      Sflm::frontend('css')->addFolder(WEBROOT_PATH.'/m/css');
      Sflm::frontend('css')->addFolder(NGN_ENV_PATH.'/thm/four/thm/css');
      Sflm::frontend('css')->addFolder(ThmFourModule::$rootPath.'/'.$this->themeFourModule().'/m/css');
      Sflm::frontend('js')->addLib('m/js/init.js');
    }
  }

  function oProcessForm(DdForm $form) {
    $form->options['deleteFileUrl'] = $this->d['basePath'].'?a=deleteFile';
  }

}