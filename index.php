<?php
	require 'su.php';
	$m = new baidu();
	$url = $_GET['url'];
	if(count($url)){
		$page = $m->index($url);
		echo '<script>window.location.href="http://baidu.iuc.me?url='.$page.'";</script>';
	}else{
		$page = $m->index('https://iphone.zol.cx/index/news/');
		echo '<script>window.location.href="http://baidu.iuc.me?url='.$page.'";</script>';
	}
	