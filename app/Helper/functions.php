<?php
	/**
	 * Created by OHHIDE.
	 * User: OHH
	 * Date: 2018/6/10
	 * Time: 下午6:23
	 */
	function getIp(){
		if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
			$ip = getenv("HTTP_CLIENT_IP");
		else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
			$ip = getenv("REMOTE_ADDR");
		else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
			$ip = $_SERVER['REMOTE_ADDR'];
		else
			$ip = "unknown";
		return($ip);
	}


	/**
	获取 IP  地理位置
	 * 淘宝IP接口
	 * @Return: array
	 */
	function getCity($ip = '')
	{
		$url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
		$ip=json_decode(file_get_contents($url));
		if((string)$ip->code=='1'){
			return false;
		}
		$data = (array)$ip->data;
		return $data;
	}

	//树状结构
	function getTree($data, $pId,$id,$pid)
	{
		$tree = [];
		unset($data[0]);//忽略根目录，不然会陷入死循环
		foreach($data as $k => $v)
		{
			if($v->$pid == $pId)
			{         //父亲找到儿子
				$v->$pid = getTree($data, $v->$id,$id,$pid);
				$tree[] = (array)$v;
			}
		}
		return $tree;
	}

	//将树状结构组装
	function makeJson($tree){
		$arr = [];
		foreach($tree as $k => $v){
			$data['value'] = $v['c_id'];
			$data['label'] = $v['c_name'];
			$data['children'] = makeJson($v['c_pid']);
			if(empty($data['children'])){
				unset($data['children']);
			}
			$arr[] = $data;
		}
		return $arr;
	}
