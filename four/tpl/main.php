<!DOCTYPE html>
<html>
<head>
  <title><?= $d['pageHeadTitle'] ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="shortcut icon" href="/m/img/favicon.ico">
  <link rel="icon" href="data:;base64,=">
  {sflm}
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
  <link rel="stylesheet" type="text/css" href="/thm/css/design.css" media="screen, projection"/>
</head>
<body>
<div class="header">
  <div class="container">
    <? if (!$d['mobile']) { ?>
    <a href="/" class="logo"><i><b></b></i><?= SITE_TITLE ?></a>
    <div class="sectionWrapper"><a href="<?= $d['basePath'] ?>" class="section"><?= $d['sectionTitle'] ?></a></div>
    <div class="menu">
      <? if ($d['menu']) $this->tpl('cp/links', $d['menu']) ?>
    </div>
    <?/*<a href="http://m.<?= SITE_DOMAIN ?>" style="position:absolute;right:150px;top: 0px;"><img title="Мобильная версия" style="width:50%" src="http://www.moneymt.co.uk/wp-content/themes/mau/images/c_header_mobile.png"></a>*/?>
    <? } ?>
    <? if (!$d['mobile']) { ?>
    <div class="personal">
      <? if ($id = Auth::get('id')) { ?>
        <? if ($d['profile']['sm_image']) { ?>
          <img src="<?= $d['profile']['sm_image'] ?>" class="avatar" />
        <? } ?>
        <div class="login pseudoLink" id="login"><?= UsersCore::getTitle($id) ?></div>
        <script>$('login').addEvent('click', Ngn.ThmFour.Profile.openEditDialog);</script>
        <a href="?logout=1">Выход</a>
      <? } else { ?>
        <a href="#" class="auth">Войти</a>
      <? } ?>
    </div>
    <? } ?>
  </div>
</div>
<? if ($d['submenu']) { ?>
<div class="container">
  <div class="submenu">
    <? $this->tpl('cp/links', $d['submenu']) ?>
  </div>
</div>
<? } ?>
<div class="container body <?= $d['layout'] ?>">
  <? if ($d['topTpl']) { ?>
    <? $this->tpl($d['topTpl'], $d) ?>
  <? } ?>
  <div class="cTop"></div>
  <div class="pages">
    <div class="cBody">
      <? $this->tpl($d['layout'], $d, false, false, 'layout') ?>
    </div>
  </div>
  <div class="cBottom">
  </div>
</div>

<div class="footer">
  <? $this->tpl('counters', null, true) ?>
  <?= $d['footer'] ?>
</div>

</body>

</html>