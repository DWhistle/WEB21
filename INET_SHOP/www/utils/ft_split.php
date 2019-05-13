<?php
function ft_split($str)
{
	$r = trim($str);
	if (empty($r))
		return (array());
	$r = explode(' ', preg_replace("/\s+/", ' ', $r));
	sort($r);
	return ($r);
}
?>
