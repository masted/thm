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
    <link rel="stylesheet" type="text/css" href="/thm/css/mobile/design.css" media="screen, projection"/>
    <link rel="stylesheet" type="text/css" href="/thm/css/mobile/ddoTitleSlider.css" media="screen, projection"/>
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
  {sflm}
  <? } ?>
</head>
<body>
<div class="header">
  <div class="container">
    <? if (!$d['mobile']) { ?>
    <a href="/" class="logo"><?= SITE_TITLE ?></a>
    <a href="<?= $d['basePath'] ?>" class="section"><?= $d['sectionTitle'] ?></a>
    <div class="menu">
      <? if ($d['menu']) $this->tpl('cp/links', $d['menu']) ?>
    </div>
    <? } ?>
    <? if (!$d['mobile']) { ?>
    <div class="personal">
      <? if ($id = Auth::get('id')) { ?>
        <div class="login"><?= UsersCore::getTitle($id) ?></div>
        <a href="?logout=1">Выход</a>
      <? }
      else { ?>
        <a href="#" class="auth">Войти</a>
      <? } ?>
    </div>
    <? } ?>
  </div>
</div>
<div class="container body <?= $d['layout'] ?>">
  <? if ($d['topTpl']) { ?>
    <? $this->tpl($d['topTpl'], $d) ?>
  <? } ?>
  <div class="cTop"></div>
  <div class="pages">
    <div class="cBody">
      <div class="menu">
        <? if ($d['menu']) $this->tpl('cp/links', $d['menu']) ?>
      </div>
    </div>
    <div class="cBody">
      <? $this->tpl($d['layout'], $d, false, false, 'layout') ?>
    </div>
  </div>
  <div class="cBottom">
  </div>
</div>
</body>
</html>