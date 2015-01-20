<?php 

function formatDate($timestamp, $format = null)
{
	$format = $format ?: 'Y-m-d';

	return date_format(date_create($timestamp), $format);
}
