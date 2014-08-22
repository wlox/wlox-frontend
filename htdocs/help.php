<?php
include '../cfg/cfg.php';

if (User::$awaiting_token)
	Link::redirect('verify-token.php');
elseif (!User::isLoggedIn())
	Link::redirect('login.php');

API::add('User','getInfo',array($_SESSION['session_id']));
$query = API::send();
$user_info = $query['User']['getInfo']['results'][0];

Link::redirect('http://support.1btcxe.com/login/sso?name='.urlencode($user_info['first_name'].' '.$user_info['last_name']).'&email='.urlencode($user_info['email']).'&amp;timestamp='.(time()).'&hash='.hash_hmac('md5',($user_info['first_name'].' '.$user_info['last_name'].$user_info['email'].(time())),$CFG->freshdesk_key));
