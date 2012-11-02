<?php

//remove password
foreach( $organization['User'] as &$user )
{
	$user['password'] = '';
}

echo json_encode($organization);
?>