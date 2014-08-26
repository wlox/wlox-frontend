<?php
include '../cfg/cfg.php';

API::add('Content','getRecord',array('trading-competition-explain1'));
API::add('Content','getRecord',array('trading-competition-explain2'));
API::add('Content','getRecord',array('trading-competition-explain3'));
$query = API::send();

$content = $query['Content']['getRecord']['results'][0];
$content1 = $query['Content']['getRecord']['results'][1];
$content2 = $query['Content']['getRecord']['results'][2];
$page_title = strip_tags(Lang::string('trading-competition-hello'));

include 'includes/head.php';
?>
<div class="page_title">
	<div class="container">
		<div class="title"><h1><?= Lang::string('trading-competition') ?></h1></div>
        <div class="pagenation">&nbsp;<a href="index.php"><?= Lang::string('home') ?></a> <i>/</i> <a href="contest-explain.php"><?= Lang::string('trading-competition') ?></a></div>
	</div>
</div>
<div class="container">
	<div class="content_right">
		<h1><?= Lang::string('trading-competition-hello') ?></h1>
		<div class="sponsored" style="font-size: 15px;font-weight: bold;padding: 10px;text-align:center;">
   		<?= Lang::string('sponsored-by') ?>: <a href="https://cryptocapital.co/" target="_blank"><img style="background-color:#25292C;padding:5px 0;margin-left:15px;margin-right:75px;padding-right:10px;border-radius:8px;width: 300px;margin-bottom:-9px" src="images/crypto.png" /></a>
   		</div>
			
   		<div class="clearfix mar_top5"></div>
   		<div class="one_fourth">
			<div class="framed-box">
				<div class="framed-box-wrap">
					<div class="pricing-title">
					<h3><?= Lang::string('competition-first-place') ?></h3>
					</div>
					<div class="pricing-text-list">
                        <ul>
                        <li class="bigger"><i class="fa fa-btc" style="color:#F27400;"></i> 5 BTC</li>
                        </ul>
						<br>
					</div>
				</div>
			</div>
		</div>
		<div class="one_fourth">
			<div class="framed-box">
				<div class="framed-box-wrap">
					<div class="pricing-title">
					<h3><?= Lang::string('competition-second-place') ?></h3>
					</div>
					<div class="pricing-text-list">
                        <ul>
                        <li class="bigger"><i class="fa fa-btc" style="color:#F27400;"></i> 2 BTC</li>
                        </ul>
						<br>
					</div>
				</div>
			</div>
		</div>
		<div class="one_fourth">
			<div class="framed-box">
				<div class="framed-box-wrap">
					<div class="pricing-title">
					<h3><?= Lang::string('competition-third-place') ?></h3>
					</div>
					<div class="pricing-text-list">
                        <ul>
                        <li class="bigger"><i class="fa fa-btc" style="color:#F27400;"></i> 1 BTC</li>
                        </ul>
						<br>
					</div>
				</div>
			</div>
		</div>
		<div class="one_fourth last">
			<div class="framed-box">
				<div class="framed-box-wrap" style="min-height:190px;">
					<div class="pricing-title">
					<h3><?= Lang::string('competition-fourth') ?></h3>
					</div>
					<div class="pricing-text-list">
                        <ul>
                        <li ><?= Lang::string('competition-fourth-desc') ?></li>
                        </ul>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix mar_top5"></div>
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
    <? include 'includes/sidebar_topics.php'; ?>
	<div class="clearfix mar_top8"></div>
</div>
<? include 'includes/foot.php'; ?>