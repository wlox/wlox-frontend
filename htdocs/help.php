<?php
include '../lib/common.php';

if (User::$awaiting_token)
	Link::redirect('verify-token.php');
elseif (!User::isLoggedIn())
	Link::redirect('https://support.1btcxe.com/');

API::add('User','getInfo',array($_SESSION['session_id']));
$query = API::send();
$user_info = $query['User']['getInfo']['results'][0];
$remote_url = preg_replace("/[^a-z0-9\/-]/", "",$_REQUEST['url']);

if ($remote_url) {
	$remote_url = '&redirect_to='.urlencode('https://support.1btcxe.com/'.$remote_url);
}

Link::redirect('http://support.1btcxe.com/login/sso?name='.urlencode($user_info['first_name'].' '.$user_info['last_name']).'&email='.urlencode($user_info['email']).'&amp;timestamp='.(time()).'&hash='.hash_hmac('md5',($user_info['first_name'].' '.$user_info['last_name'].$user_info['email'].(time())),$CFG->helpdesk_key).$remote_url);
