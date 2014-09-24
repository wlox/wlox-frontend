<?php
include '../cfg/cfg.php';

API::add('Competition','get');
if (User::isLoggedIn())
	API::add('Competition','getUserRank');

$query = API::send();

$leaders = $query['Competition']['get']['results'][0];
$user_rank = $query['Competition']['getUserRank']['results'][0];
$page_title = strip_tags(Lang::string('trading-competition-board'));

include 'includes/head.php';
?>
<div class="page_title">
	<div class="container">
		<div class="title"><h1><?= Lang::string('trading-competition') ?></h1></div>
        <div class="pagenation">&nbsp;<a href="<?= Lang::url('index.php') ?>"><?= Lang::string('home') ?></a> <i>/</i> <a href="contest-explain.php"><?= Lang::string('trading-competition') ?></a></div>
	</div>
</div>
<div class="container">
	<div class="content_right">
		<h1><?= Lang::string('trading-competition-board') ?></h1>
		<div class="one_half">
			<? if (time() < strtotime('2014-09-09 11:00:00')) { ?>
			<div class="starting_in rank"><i class="fa fa-clock-o fa-2x"></i> <?= Lang::string('competition-starting-in') ?>: <span class="time_until"></span><input type="hidden" class="time_until_seconds" value="<?= (strtotime('2014-09-09 11:00:00') * 1000) ?>" /></div>
   			<? } elseif (time() >= strtotime('2014-09-09 11:00:00') && time() < strtotime('2014-09-19 11:00:00')) { ?>
   			<div class="starting_in rank"><i class="fa fa-clock-o fa-2x"></i> <?= Lang::string('competition-time-left') ?>: <span class="time_until"></span><input type="hidden" class="time_until_seconds" value="<?= (strtotime('2014-09-19 11:00:00') * 1000) ?>" /></div>
   			<? } else { ?>
   			<div class="starting_in rank"><i class="fa fa-clock-o fa-2x"></i> <?= Lang::string('competition-time-left') ?>: <span class="prize"><?= Lang::string('competition-finished') ?></span></div>
   			<? } ?>
   		</div>
   		<? if (User::isLoggedIn() && time() >= strtotime('2014-09-09 11:00:00')) { ?>
   		<div class="one_half last">
   			<div class="starting_in rank"><i class="fa fa-user fa-2x"></i> <?= Lang::string('competition-my-rank') ?>: <span class="prize"><b><?= $user_rank['rank']?></b> <small>(<?= (($user_rank['usd_gain'] >= 0) ? '+' : '').number_format($user_rank['usd_gain'],2) ?> USD)</small></span></div>
   		</div>
   		<? } ?>
   		<div class="clear"></div>
	   	<a href="contest-explain.php" style="font-size:15px;text-decoration:underline;"><?= Lang::string('competition-rules') ?></a>
   		<div class="clearfix mar_top3"></div>
   		<div class="table-style">
   			<table class="table-list trades competition">
        		<tr id="table_first">
        			<th><?= Lang::string('competition-top-10') ?></th>
        			<th><?= Lang::string('competition-profit') ?></th>
        		</tr>
        		<?php 
        		$trophy = ($i == 1) ? '<i class="fa fa-trophy"></i> ' : '';
        		$me = ($leader['me']) ? '<i class="fa fa-user"></i> ' : '';
        		?>
				<tr>
					<td><img src="images/flags/hr.png"/>&nbsp;&nbsp;<b>D. K.</b></td>
					<td>$32,808.94</td>
				</tr>
				<tr>
					<td><img src="images/flags/id.png"/>&nbsp;&nbsp;<b>M. S.</b></td>
					<td>$18,935.85</td>
				</tr>
				<tr>
					<td><img src="images/flags/de.png"/>&nbsp;&nbsp;<b>T. W.</b></td>
					<td>$15,852.91</td>
				</tr>
				<tr>
					<td><img src="images/flags/il.png"/>&nbsp;&nbsp;<b>A. E.</b></td>
					<td>$10,122.24</td>
				</tr>
				<tr>
					<td><img src="images/flags/us.png"/>&nbsp;&nbsp;<b>S. B.</b></td>
					<td>$8,295.79</td>
				</tr>
				<tr>
					<td><img src="images/flags/ca.png"/>&nbsp;&nbsp;<b>J. Z.</b></td>
					<td>$6,073.16</td>
				</tr>
				<tr>
					<td><img src="images/flags/us.png"/>&nbsp;&nbsp;<b>E. C.</b></td>
					<td>$5,838.83</td>
				</tr>
				<tr>
					<td><img src="images/flags/gt.png"/>&nbsp;&nbsp;<b>D. C.</b></td>
					<td>$4,021.95</td>
				</tr>
				<tr>
					<td><img src="images/flags/us.png"/>&nbsp;&nbsp;<b>T. H.</b></td>
					<td>$3,569.00</td>
				</tr>
				<tr>
					<td><img src="images/flags/id.png"/>&nbsp;&nbsp;<b>S. S.</b></td>
					<td>$3,321.25</td>
				</tr>
        	</table>
   		</div>
   		<div class="clearfix mar_top3"></div>
   		<div class="clear"></div>
   		<h2><?= Lang::string('competition-rewards') ?>*</h2>
   		<div class="one_third">
			<div class="starting_in"><?= Lang::string('competition-typo') ?> <span class="prize">0.002 BTC</span></div>
		</div>
   		<div class="one_third">
			<div class="starting_in"><?= Lang::string('competition-func') ?> <span class="prize">0.005 BTC</span></div>
   		</div>
   		<div class="one_third last">
			<div class="starting_in"><?= Lang::string('competition-exploits') ?> <span class="prize">0.1 BTC</span></div>
   		</div>
   		<p>* <?= Lang::string('competition-contingency') ?></p>
   		<div class="clearfix mar_top3"></div>
   		<ul class="list_empty">
   		<? if (!User::isLoggedIn()) { ?>
			<li><a href="buy-sell.php" class="but_user"><i class="fa fa-user fa-lg"></i> <?= Lang::string('home-register') ?></a></li>
		<? } else { ?>
			<li><a href="account.php" class="but_user"><i class="fa fa-user fa-lg"></i> <?= Lang::string('account') ?></a></li>
		<? } ?>
		</ul>
    </div>
    <? include 'includes/sidebar_topics.php'; ?>
	<div class="clearfix mar_top8"></div>
</div>
<? include 'includes/foot.php'; ?>