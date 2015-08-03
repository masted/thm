<style>
  .authors {
    padding: 15px 0 0 30px;
  }
  .authors .item {
    float: left;
    margin: 0 30px 10px 0;
    width: 100px;
    height: 160px;
    font-size: 10px;
    position: relative;
  }
  .authors .item .tit {
    margin-top: 5px;
  }
  .authors .item a {
    color: #000;
    text-decoration: none;
  }
  .authors .item a:hover {
    text-decoration: underline;
  }
  .authors .postCnts {
    position: absolute;
    top: 0px;
    right: 0px;
  }
  .authors .postCnt {
    background: #ccc;
    border-radius: 20px;
    padding: 5px;
    width: 18px;
    height: 18px;
    margin-bottom: 2px;
    cursor: default;
    text-align: center;
  }
  .authors .postCnt.hour {
    background: #ED0461;
    color: #fff;
  }
  .authors .postCnt.day {
    background: #0078AB;
    color: #fff;
  }
  .authors .postCnt span {
    display: inline-block;
    padding-top: 2px;
  }
  .avatar img {
    width: 60px;
    height: 60px;
  }
</style>
<?
$countTitles = [
  'week' => 'Постов за неделю',
  'day' => 'Постов за день',
  'hour' => 'Постов за последний час',
];
?>
<div class="authors">
  <? foreach ($d['items'] as $v) { ?>
    <div class="item">
      <div class="postCnts">
        <? foreach ($d['postCounts'] as $k => $counts) { ?>
          <? if ($d['postCounts'][$k][$v['userId']]) { ?>
            <div class="postCnt <?= $k ?>" title="<?= $countTitles[$k] ?>"><span><?= $d['postCounts'][$k][$v['userId']] ?></span></div>
          <? } ?>
        <? } ?>
      </div>
      <a href="/blog/user/<?= $v['userId'] ?>" class="avatar">
        <img src="<?= $v['image'] ? '/u/'.Misc::getFilePrefexedPath2($v['image'], 'sm_') : '/i/img/empty.png' ?>">
        <div class="tit"><?= $v['name'] ?></div>
      </a>
    </div>
  <? } ?>
</div>
