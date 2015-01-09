<script src="/m/js/audiojs/audio.js"></script>
<div class="tracks">
  <? foreach ($d['tracks'] as $v) { ?>
    <div class="row">
      <div class="image">
        <img src="<?= $v['item']['md_image'] ?>" alt="">
        <a href="#">Download Album</a>
      </div>
      <div class="text">
        <a name="album<?= $v['item']['id'] ?>"></a>
        <h3><?= $v['item']['title'] ?></h3>
        <div class="players">
          <? foreach ($v['subItems'] as $vv) { ?>
            <audio src="<?= $vv['track'] ?>" preload="none" data-title="<?= $vv['title'] ?>"></audio>
          <? } ?>
        </div>
      </div>
    </div>
    <div class="line"></div>
    <div class="clear" style="height:20px;"></div>
  <? } ?>
</div>
<script>
  audiojs.events.ready(function() {
    audiojs.createAll();
  });
</script>

