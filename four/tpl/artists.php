<div class="artists">
<? foreach ($d['artists'] as $v) { ?>
  <div class="item">
    <a href="/user/<?= $v['user'] ?>/music"><img src="<?= $v['md_image'] ?>"></a>
    <p><?= $v['name'] ?></p>
  </div>
<? } ?>
</div>