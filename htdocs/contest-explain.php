<?php
include '../cfg/cfg.php';

API::add('Content','getRecord',array('trading-competition-explain1'));
API::add('Content','getRecord',array('trading-competition-explain2'));
API::add('Content','getRecord',array('trading-competition-explain3'));
$query = API::send();

$content = $query['Content']['getRecord']['results'][0];
$content1 = $query['Content']['getRecord']['results'][1];
$content2 = $query['Content']['getRecord']['results'][2];
$page_title = Lang::string('trading-competition-hello');

include 'includes/head.php';
?>
<div class="page_title">
	<div class="container">
		<div class="title"><h1><?= Lang::string('trading-competition') ?></h1></div>
        <div class="pagenation">&nbsp;<a href="index.php"><?= Lang::string('home') ?></a> <i>/</i> <a href="contest-explain.php"><?= Lang::string('trading-competition') ?></a></div>
	</div>
</div>
<div class="container">
	<? include 'includes/sidebar_topics.php'; ?>
	<div class="content_right">
		<h1><?= Lang::string('trading-competition-hello') ?></h1>
			<? if (time() < strtotime('2014-09-01 00:00:00')) { ?>
			<div class="starting_in"><i class="fa fa-clock-o fa-2x"></i> <?= Lang::string('competition-starting-in') ?>: <span class="time_until"></span><input type="hidden" class="time_until_seconds" value="<?= (strtotime('2014-09-01 00:00:00') * 1000) ?>" /></div>
   			<? } elseif (time() >= strtotime('2014-09-01 00:00:00') && time() < strtotime('2014-09-06 00:00:00')) { ?>
   			<div class="starting_in"><i class="fa fa-clock-o fa-2x"></i> <?= Lang::string('competition-time-left') ?>: <span class="time_until"></span><input type="hidden" class="time_until_seconds" value="<?= (strtotime('2014-09-06 00:00:00') * 1000) ?>" /></div>
   			<? } else { ?>
   			<div class="starting_in"><i class="fa fa-clock-o fa-2x"></i> <?= Lang::string('competition-time-left') ?>: <span class="prize"><?= Lang::string('competition-finished') ?></span></div>
   			<? } ?>
   		<div class="one_third">
			<div class="starting_in"><i class="fa fa-trophy fa-2x"></i> <?= Lang::string('competition-first-place') ?> <span class="prize">5 BTC</span></div>
   		</div>
   		<div class="one_third">
			<div class="starting_in"><i class="fa fa-trophy fa-2x"></i> <?= Lang::string('competition-second-place') ?> <span class="prize">3 BTC</span></div>
   		</div>
   		<div class="one_third last">
			<div class="starting_in"><i class="fa fa-trophy fa-2x"></i> <?= Lang::string('competition-third-place') ?> <span class="prize">2 BTC</span></div>
   		</div>
   		<div class="testimonials-4">
   			<div class="content">
            	<h3 class="section_label">
                    <span class="left"><b>1</b></span>
                    <span class="right"><?= $content['title'] ?></span>
                </h3>
                <div class="clear"></div>
                <div class="balances">
                <?= $content['content'] ?>
                </div>
            	<div class="clear"></div>
            </div>
            <div class="clear"></div>
   		</div>
   		<div class="clear"></div>
   		<div class="clearfix mar_top2"></div>
   		<div class="testimonials-4">
   			<div class="content">
            	<h3 class="section_label">
                    <span class="left"><b>2</b></span>
                    <span class="right"><?= $content1['title'] ?></span>
                </h3>
                <div class="clear"></div>
                <div class="balances">
                <?= $content1['content'] ?>
                </div>
            	<div class="clear"></div>
            </div>
            <div class="clear"></div>
   		</div>
   		<div class="clear"></div>
   		<div class="clearfix mar_top2"></div>
   		<div class="testimonials-4">
   			<div class="content">
            	<h3 class="section_label">
                    <span class="left"><b>3</b></span>
                    <span class="right"><?= $content2['title'] ?></span>
                </h3>
                <div class="clear"></div>
                <div class="balances">
                <?= $content2['content'] ?>
                </div>
            	<div class="clear"></div>
            </div>
            <div class="clear"></div>
   		</div>
   		<div class="clearfix mar_top3"></div>
   		<h2><?= Lang::string('competition-rewards') ?></h2>
   		<div class="one_third">
			<div class="starting_in"><?= Lang::string('competition-typo') ?> <span class="prize">0.02 BTC</span></div>
   		</div>
   		<div class="one_third">
			<div class="starting_in"><?= Lang::string('competition-func') ?> <span class="prize">0.05 BTC</span></div>
   		</div>
   		<div class="one_third last">
			<div class="starting_in"><?= Lang::string('competition-exploits') ?> <span class="prize">0.1 BTC</span></div>
   		</div>
   		<? if (!User::isLoggedIn()) {?>
   		<div class="clearfix mar_top3"></div>
   		<ul class="list_empty">
			<li><a href="register.php" class="but_user"><i class="fa fa-user fa-lg"></i> <?= Lang::string('home-register') ?></a></li>
			<li><a href="login.php" class="but_user"><i class="fa fa-key fa-lg"></i> <?= Lang::string('home-login') ?></a></li>
		</ul>
		<? } else { ?>
		<div class="clearfix mar_top3"></div>
   		<ul class="list_empty">
			<li><a href="contest-status.php" class="but_user"><i class="fa fa-user fa-lg"></i> <?= Lang::string('competition-status') ?></a></li>
		</ul>
		<? } ?>
    </div>
	<div class="clearfix mar_top8"></div>
</div>
<? include 'includes/foot.php'; ?>