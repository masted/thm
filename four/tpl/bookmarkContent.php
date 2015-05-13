<div class="bookmarks">
  <? $d['title'] ? print '<h1>'.$d['title'].'</h1>' : $this->tpl('cp/links', $d['bookmarks']) ?>
</div>
<div class="colBody">
  <?= $d['contentTpl'] ? $this->tpl($d['contentTpl'], $d, false, false, 'contentTpl') : '<div class="colBodyContent">'.$d['html'].'</div>' ?>
</div>
<script>
  new Ngn.DdoItemsEdit();
</script>