<?php
if (!defined('FORUM')) die();

global $lang_nl_cooldate;

if ($type == FORUM_FT_DATETIME || $type == FORUM_FT_DATE) {
	if ($date_format == null)
		$date_format = $forum_date_formats[$forum_user['date_format']];
	$delimeter = '-';
	if (strpos($date_format, '-')!==false) $delimeter = '-';
	if (strpos($date_format, '.')!==false) $delimeter = '.';
	if (strpos($date_format, ' ')!==false) $delimeter = ' ';
	$date_format = explode($delimeter, $date_format);
	foreach ($date_format as $k=>$v) {
		if ($v=='m') { $date_format[$k] = 'B1'; $delimeter = ' '; }
		if ($v=='d') $date_format[$k] = 'j';
	}
	$date_format = implode($delimeter, $date_format);

	if (strpos($date_format, 'B1')!==false) {
		$m = gmdate('m', $timestamp + ($forum_user['timezone'] + $forum_user['dst']) * 3600);
		$m = (int)$m - 1;
		$a = array($lang_nl_cooldate['b1_january'], $lang_nl_cooldate['b1_february'], $lang_nl_cooldate['b1_march'], $lang_nl_cooldate['b1_april'], $lang_nl_cooldate['b1_may'], $lang_nl_cooldate['b1_june'], $lang_nl_cooldate['b1_july'], $lang_nl_cooldate['b1_august'], $lang_nl_cooldate['b1_september'], $lang_nl_cooldate['b1_october'], $lang_nl_cooldate['b1_november'], $lang_nl_cooldate['b1_december']);
		$date_format = str_replace('B1', isset($a[$m])?$a[$m]:'D', $date_format);
	}

	if (strpos($date_format, 'B0')!==false) {
		$m = gmdate('m', $timestamp + ($forum_user['timezone'] + $forum_user['dst']) * 3600);
		$m = (int)$m - 1;
		$a = array($lang_nl_cooldate['b0_january'], $lang_nl_cooldate['b0_february'], $lang_nl_cooldate['b0_march'], $lang_nl_cooldate['b0_april'], $lang_nl_cooldate['b0_may'], $lang_nl_cooldate['b0_june'], $lang_nl_cooldate['b0_july'], $lang_nl_cooldate['b0_august'], $lang_nl_cooldate['b0_september'], $lang_nl_cooldate['b0_october'], $lang_nl_cooldate['b0_november'], $lang_nl_cooldate['b0_december']);
		$date_format = str_replace('B0', isset($a[$m])?$a[$m]:'D', $date_format);
	}
}
