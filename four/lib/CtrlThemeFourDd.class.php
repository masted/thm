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
    $this->d['contentTpl'] = 'dd/list';
  }

  function action_item() {
    $this->d['layout'] = 'cols2';
    $this->d['blocksTpl'] = 'empty';
    $this->d['tpl'] = 'bookmarkContent';
    $this->d['contentTpl'] = 'dd/item';
    $this->d['item'] = $item = $this->items()->getItem($this->req->param(1));
    if (!$item) throw new Error404;
    $this->setPageTitle($item['title'] ?: ' ');
    if ($item['title']) $this->setPageTitle($item['title']);
    $ddo = new Ddo($this->getStrName(), 'siteItem');
    $this->d['html'] = $ddo->setItem($item)->els();
  }

}