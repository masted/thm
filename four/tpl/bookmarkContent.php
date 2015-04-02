<div class="bookmarks">
  <? $this->tpl('cp/links', $d['bookmarks']) ?>
</div>
<div class="colBody">
  <?= $this->tpl($d['contentTpl'], $d, false, false, 'contentTpl') ?>
</div>
<script>
  new Ngn.DdoItemsEdit();
</script>