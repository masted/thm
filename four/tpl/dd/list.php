<div class="pNums pNumsTop"><?= $d['pNums'] ?></div>
<?= $d['html'] ?>
<div class="pNums pNumsBottom"><?= $d['pNums'] ?></div>

<script>
new Ngn.DdoItemsEdit();
Ngn.Btn.AddAuthorized(document.getElement('.bookmarks'), {
  basePath: '<?= $d['basePath']?>'
});
</script>