# Vnil视频/图集解析去水印接口文档

## Vnil(https://www.vnil.cn) 解析接口已支持：小红书、快手、淘宝、instagram、天猫、京东、一淘、拼多多、绿洲、美图秀秀、微博、美拍、一淘、1688、唯品会、考拉等平台视频、高清大图去水印下载解析API接口

### 关于接口：

	1、接口采用RESTful API方式提供，不限制开发语言。当前文档中提供了PHP和Python两种语言的代码实例便于开发者方便接入。
		
	2、接口支持GET和POST两种参数提交方式
		
	3、接口错误码请参考“附录1：错误码说明”


### 一、视频/图集去水印解析接口
**URL：https://api.vnil.cn/api/parse/deal**  
**请求方式：GET/POST**  
**请求参数：**  

|字段|类型|必填|备注|赋值|
|---|---|---|---|---|  
| appkey | string | Y | 	appkey | https://www.vnil.cn 开发者后台获取|
| url | string | Y | 要解析的资源地址信息 |例如：http://xhslink.com/f0aZc|

**返回结果：**  

**成功：**  

	{"code":0,"msg":"success","body":{"url":"https://item.jd.com/3274923.html","platform":"jd","text":"欧普照明（OPPLE）厨卫灯 led平板灯集成吊顶天花板铝扣面板厨房卫生间嵌入式300*600 银色白光18w","images":["https://m.360buyimg.com/mobilecms/s750x750_jfs/t1/111404/12/12803/89591/5f1473c8E79a4a52f/7a5c353cc263fca9.jpg","https://m.360buyimg.com/mobilecms/s750x750_jfs/t1/92420/5/16539/166250/5e7cbce9E82c78518/49fb2eee11eb3f40.jpg","https://m.360buyimg.com/mobilecms/s750x750_jfs/t30010/250/1163655861/175147/d1f340ca/5cd91446Nc4f27204.jpg","https://m.360buyimg.com/mobilecms/s750x750_jfs/t1/15780/8/8700/167083/5c790abfE091e5b1b/03695a3b0a8ffccd.jpg","https://m.360buyimg.com/mobilecms/s750x750_jfs/t1/32677/34/3994/103106/5c790abeE7c3e48b7/7a0072f41a2cd982.jpg","https://m.360buyimg.com/mobilecms/s750x750_jfs/t1/18986/27/8899/54085/5c790abeE04b5f9ac/1902142f7b3afb5f.jpg"],"video_info":{"cover":"https://img.300hu.com/4c1f7a6atransbjngwcloud1oss/409860b9203912066732920833/imageSampleSnapshot/1563352521_433041572.100_5977.jpg","url":"https://vod.300hu.com/4c1f7a6atransbjngwcloud1oss/409860b9203912066732920833/v.f30.mp4?dockingId=a771bd9f-666d-4e67-91f8-a110301e6879&storageSource=3"},"type":3,"cover":"https://m.360buyimg.com/mobilecms/s750x750_jfs/t1/111404/12/12803/89591/5f1473c8E79a4a52f/7a5c353cc263fca9.jpg"}}
	
  
**失败：**	

	{"code":10001,"msg":"parameter lost","body":[]}

**返回字段注释** 

|字段名|注释|备注|
|---|---|---|
|code|错误码|错误码:请参考错误码说明|
|msg|错误信息|错误码:请参考错误码说明|
|body|||
|platform|所属平台|所属body，如：taobao、xiaohongshu|
|url|开发者请求的url|所属body|
|text|文案信息|所属body|
|cover|封面图地址|所属body|
|images|高清大图图片集合|所属body|
|video_info|视频信息|所属body，部分平台视频地址有有效期限制，不可作为永久存储|

PHP 实例代码：

	<?php
	//开发者后台生成的appkey
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

Python实例代码:

  
    #!/usr/bin/env python
    # encoding: utf-8

    import requests, urllib, json

    appkey = ""
    params = {
       "appkey": appkey,
       "url":"",
    }
	def get(url):
        params["url"] = url;
        api_url = "https://api.vnil.cn/api/parse/deal?" + urllib.parse.urlencode(params)

        msg = {"code": 0, "msg": "", "body": ""}

        response = requests.get(url=api_url, timeout=30)

        if response.status_code != 200:
		 	msg['code'] = 1
		 	msg["msg"] = "请求出现问题"
		 	return msg
	    # result = json.loads(response.text)      如果你直接拿到系统中使用请将返回参数直接转为json
	   	result = response.text  # 如果你不需要转换json，则直接接受数据并返回
	   	return result


	def post(url):
	    params["url"] = url
	    api_url = "https://api.vnil.cn/api/parse/deal"

	    msg = {"code": 0, "msg": "", "body": ""}

	    response = requests.post(url=api_url, data=params, timeout=30)
	    if response.status_code != 200:
		 	msg['code'] = 1
		  	msg["msg"] = "请求出现问题"
		  	return msg
	    # result = json.loads(response.text)      如果你直接拿到系统中使用请将返回参数直接转为json
	    result = response.text  # 如果你不需要转换json，则直接接受数据并返回
	    return result

	print(get("http://xhslink.com/f0aZc"))
	#print(post("http://xhslink.com/f0aZc"))



### 二、获取开发者信息接口
**URL：https://api.vnil.cn/api/user/info**  
**请求方式：GET/POST**  
**请求参数：**  

|字段|类型|必填|备注|赋值|
|---|---|---|---|---| 
| appkey | string | Y | appkey | https://www.vnil.cn 开发者后台获取|

**返回结果：**  

**成功：**  

	{"code":0,"msg":"success","body":{"times":995,"end_time":1597996121}}
	
**失败：**

{"code":10001,"msg":"parameter lost","body":[]}

返回字段注释

|字段名|注释|备注|
|---|---|---|
|code|错误码|错误码:请参考错误码说明|
|msg|错误信息|错误码:请参考错误码说明|
|body|||
|end_time|vip到期时间|所属body|
|times|剩余解析次数|所属body|

## 附录
### 1、错误码说明
|错误码|注释|
|---|---|
|code|错误码|
|0|解析成功|
|10001|请求参数缺失|
|10002|请求参数不合法|
|10003|开发者权限错误或开发者不存在|
|10004|签名校验失败|
|10005|请求接口的ip地址不在白名单或开发者没有设置ip白名单|
|10006|当前开发者不是vip或没有解析次数|
|10007|解析失败|
|10008|请求参数url地址不合法|
|10009|请求受限|
