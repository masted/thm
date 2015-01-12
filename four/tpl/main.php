<head>
  <title><?= $d['headerPageTitle'] ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="icon" href="data:;base64,=">
  {sflm}
  <link rel="stylesheet" type="text/css" href="http://localhost:777/thm/css/design.css" media="screen, projection"/>
  <script>
    Ngn.authorized = <?= Auth::get('id') ? 'true' : 'false' ?>;
  </script>
</head>
<body>
<div class="header">
  <div class="container">
    <a href="/" class="logo"><?= SITE_TITLE ?></a>
    <div class="menu">
      <? if ($d['menu']) $this->tpl('cp/links', $d['menu']) ?>
    </div>
    <div class="personal">
      <? if ($id = Auth::get('id')) { ?>
        <div class="login"><?= UsersCore::getTitle($id) ?></div>
        <a href="?logout=1">Выход</a>
      <? } else { ?>
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
  <? $this->tpl($d['layout'], $d) ?>
  </div>
  <div class="cBottom"></div>
</div>
</body>