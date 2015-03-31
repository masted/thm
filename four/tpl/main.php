<!DOCTYPE html>
<html>
<head>
  <title><?= $d['pageHeadTitle'] ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="icon" href="data:;base64,=">
  <? if (!$d['mobile']) { ?>
  {sflm}
  <link rel="stylesheet" type="text/css" href="/thm/css/design.css" media="screen, projection"/>
  <link rel="stylesheet" type="text/css" href="/thm/css/ulMenu.css" media="screen, projection"/>
  <script src="/i/js/tiny_mce/tiny_mce.js"></script>
  <script>
    Ngn.authorized = <?= Auth::get('id') ?: 'false' ?>;
    Ngn.isAdmin  = <?= Misc::isAdmin() ? 'true' : 'false' ?>;
    window.addEvent('domready', function() {
      Ngn.addBtnAction('.auth', function() {
        new Ngn.Dialog.Auth();
      });
      Ngn.Milkbox.add(document.getElements('a.lightbox'));
    });
  </script>
  <? } else { ?>
    <link rel="stylesheet" type="text/css" href="/thm/mobile/main.css" media="screen, projection"/>
  <? } ?>
</head>
<body>
<div class="header">
  <div class="container">
    <a href="/" class="logo"><?= SITE_TITLE ?></a>
    <div class="menu">
      <? if ($d['menu']) $this->tpl('cp/links', $d['menu']) ?>
    </div>
    <div class="personal">
      <?/*<?= Misc::formatPrice(memory_get_usage()) ?>&nbsp;&nbsp;&nbsp;*/?>
      <? if ($id = Auth::get('id')) { ?>
        <div class="login"><?= UsersCore::getTitle($id) ?></div>
        <a href="?logout=1">Выход</a>
      <? }
      else { ?>
        <a href="#" class="auth">Войти</a>
      <? } ?>
    </div>
  </div>
</div>
<div class="container body <?= $d['layout'] ?>">
  <? if ($d['topTpl']) { ?>
    <? $this->tpl($d['topTpl'], $d) ?>
  <? } ?>
  <div class="cTop"></div>
  <div class="cBody">
    <? $this->tpl($d['layout'], $d, false, false, 'layout') ?>
  </div>
  <div class="cBottom">
  </div>
</div>
</body>
</html>