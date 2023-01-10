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
?>