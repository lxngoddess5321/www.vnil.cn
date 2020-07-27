<?php
// https://www.vnil.cn开发者后台生成的appkey
$appkey = '';
	
//需要解析的url
$url = '';

$param = [
	'appkey'	=> $appkey,
	'url'		=> $url,
];

//得到请求的地址：https://api.vnil.cn/api/parse/deal?appkey=appkey&url=url

$apiUrl = 'https://api.vnil.cn/api/parse/deal?'.http_build_query($param);

$ch = curl_init();
curl_setopt ( $ch, CURLOPT_URL, $apiUrl );
curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
curl_setopt ( $ch, CURLOPT_MAXREDIRS, 5 );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, 1 );
curl_setopt ( $ch, CURLOPT_TIMEOUT, 10 );
$content = curl_exec( $ch );
curl_close ( $ch);

print_r($content);
