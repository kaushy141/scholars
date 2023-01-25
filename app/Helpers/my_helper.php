<?php
//user status class for color
function statusClass($status)
{
	$statusColorArray = [
		'Active' => 'success',
		'Unverified' => 'info',
		'Suspended' => 'warning',
		'Deleted' => 'danger'
	];

    return isset($statusColorArray[$status])?$statusColorArray[$status]:"primary";
}

function booleanClass($status)
{
	$statusArray = ['danger','success'];

    return isset($statusArray[$status])?$statusArray[$status]:"primary";
}

function booleanLabel($status)
{
	$statusLabelArray = ['Deactive', 'Active'];

    return isset($statusLabelArray[$status])?$statusLabelArray[$status]:"Other";
}

function currentFinYear() 
{
	return date('m') < 4 ? ((date('Y') - 1) - 2000) . (date('Y') - 2000) : (date('Y') - 2000) . ((date('Y') + 1) - 2000);
}

function finYearView($finYear){
	$f = str_split($finYear, 2);
    return "20" . $f[0] . " - " . "20" . $f[1];
}

function dateView($timestamp, $format = 'D, dM-Y'){
	return date($format, strtotime($timestamp));
}

function getFolderName($root='general'){
	$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
	return $root.'/'.substr(str_shuffle($chars), 0, 1).'/'.substr(str_shuffle($chars), 0, 1);
}

function getRandomPassword($length=8){
	return substr(str_shuffle('abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ123456789'), 0, $length);
}

function dateToDb($date){
	$dateArr = explode('/', $date);
	return $dateArr[2].'-'.$dateArr[1].'-'.$dateArr[0];
}

function dbToDate($date){
	return date('d/m/Y', strtotime($date));
}
?>