<div class="span-6 col1">
  <div class="colBody blockInfo">
    <h1><?= $d['info']['name'] ?></h1>
    <img src="<?= $d['info']['md_image'] ?>"/>
    <a class="smIcons btn add" href="#"><i></i>Message</a>
  </div>
  <div class="line"></div>
  <div class="colBody blockText">
    <p>ABOUT</p>
    <p><?= $d['info']['shortText'] ?></p>
  </div>
  <div class="line"></div>
  <div class="colBody blockText">
    <p>ALBUMS</p>
    <? foreach ($d['tracks'] as $v) { ?>
      <p><a href="<?= Tt()->getPath(2) ?>/music#album<?= $v['item']['id'] ?>"><?= $v['item']['title'] ?></a></p>
    <? } ?>
  </div>
</div>
<div class="span-15 col2">
  <div class="bookmarks">
    <a href="<?= Tt()->getPath(2) ?>"<?= $d['action'] == 'default' ? ' class="selected"' : '' ?>>Info</a>
    <a href="<?= Tt()->getPath(2) ?>/music"<?= $d['action'] == 'music' ? ' class="selected"' : '' ?>>Music Gallery</a>
  </div>
  <div class="colBody">
    <? $this->tpl($d['tpl'], $d) ?>
  </div>
</div>
<div class="clear"></div>
