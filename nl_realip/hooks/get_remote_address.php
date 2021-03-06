<?php
if (!defined('FORUM')) die();

if (!defined('__REMOTE_ADDR__')) {
	$__is_ipv6 = '~(([0-9a-fA-F]{1,4}:){7,7}[0-9a-fA-F]{1,4}|([0-9a-fA-F]{1,4}:){1,7}:|([0-9a-fA-F]{1,4}:){1,6}:[0-9a-fA-F]{1,4}|([0-9a-fA-F]{1,4}:){1,5}(:[0-9a-fA-F]{1,4}){1,2}|([0-9a-fA-F]{1,4}:){1,4}(:[0-9a-fA-F]{1,4}){1,3}|([0-9a-fA-F]{1,4}:){1,3}(:[0-9a-fA-F]{1,4}){1,4}|([0-9a-fA-F]{1,4}:){1,2}(:[0-9a-fA-F]{1,4}){1,5}|[0-9a-fA-F]{1,4}:((:[0-9a-fA-F]{1,4}){1,6})|:((:[0-9a-fA-F]{1,4}){1,7}|:)|fe80:(:[0-9a-fA-F]{0,4}){0,4}%[0-9a-zA-Z]{1,}|::(ffff(:0{1,4}){0,1}:){0,1}((25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9])\.){3,3}(25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9])|([0-9a-fA-F]{1,4}:){1,4}:((25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9])\.){3,3}(25[0-5]|(2[0-4]|1{0,1}[0-9]){0,1}[0-9]))~';
	$__is_ipv4 = '/^([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/';
	$__is_localhost = '/^(unknown|localhost)$/';

	$__ipheaders = (isset($_SERVER['HTTP_DNT']) && $_SERVER['HTTP_DNT']==1) ? array('REMOTE_ADDR') : array('REMOTE_ADDR', 'HTTP_X_FORWARDED_FOR', 'HTTP_CLIENT_IP', 'HTTP_CLIENTIP');
	$__ips = array();
	foreach ($__ipheaders as $__ipheader) if (isset($_SERVER[$__ipheader])) {
		foreach(array_reverse(array_map('trim', explode(',', $_SERVER[$__ipheader]))) as $__ip) {
			$__ips[$__ip]++;
		}
	}
	$__ip = $_SERVER['REMOTE_ADDR'];
	foreach (array_keys($__ips) as $__aip) {
		if (preg_match($__is_ipv6, $__aip)) continue;
		if (preg_match($__is_localhost, $__aip)) continue;
		if (preg_match($__is_ipv4, $__aip, $__matches)) {
			if ( $__matches[1]==10 ) continue;
			if (($__matches[1]==192) and ($__matches[2]==168)) continue;
			if (($__matches[1]==172) and ($__matches[2]>=16) and ($__matches[2]<32)) continue;
			if ( $__matches[1]==127 ) continue;
			$__ip = $__aip;
		}
	}
	define('__REMOTE_ADDR__', $__ip);
}
return __REMOTE_ADDR__;
