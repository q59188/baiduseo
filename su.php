<?php
	require 'vendor/autoload.php';
	use QL\QueryList;

	class baidu
	{

		public function index($url){
			$srcs= QueryList::Query($url,array(
					'urls'=>array('a','href')
				))->data;
			$next = QueryList::Query($url,array(
				'page'=>array('a.pageTi:contains(下一页)','href')
				))->data;
			$i = 0;
			foreach ($srcs as $src) {
				$array[$i] = $src['urls'];
				$i++;
			}

			$this->song($array);
			return $next[0]['page'];
		}

		public function song($urls){
			$api = 'http://data.zz.baidu.com/urls?site=iphone.zol.cx&token=LQA3VPQqHr1mh5i8';
			$ch = curl_init();
			$options =  array(
			    CURLOPT_URL => $api,
			    CURLOPT_POST => true,
			    CURLOPT_RETURNTRANSFER => true,
			    CURLOPT_POSTFIELDS => implode("\n", $urls),
			    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
			);
			curl_setopt_array($ch, $options);
			$result = curl_exec($ch);
			echo $result;
		}
	}

