<div class="bookmarks">
  <? $this->tpl('cp/links', $d['bookmarks']) ?>
</div>
<div class="colBody">
  <?= $this->tpl('contentTpl', $d) ?>
</div>
<script>
  new Ngn.DdoItemsEdit();
</script>