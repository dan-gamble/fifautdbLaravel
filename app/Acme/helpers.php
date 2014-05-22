<?php

function errors_for($attribute, $errors)
{
    return $errors->first($attribute, '<small class="error">:message</small>');
}

function space_to_dash($value)
{
    return ctype_lower($value) ? $value : str_replace(' ', '-', strtolower($value));
}

function space_to_underscore($value)
{
    return ctype_lower($value) ? $value : str_replace(' ', '_', strtolower($value));
}

function role_reversal($d_pos)
{
	$role = $d_pos;
	if ($role == 'LW') {
		$role = '27';
	} elseif ($role == 'ST') {
		$role = '25';
	} elseif ($role == 'RW') {
		$role = '23';
	} elseif ($role == 'CF') {
		$role = '21';
	} elseif ($role == 'CAM') {
		$role = '18';
	} elseif ($role == 'LM') {
		$role = '16';
	} elseif ($role == 'CM') {
		$role = '14';
	} elseif ($role == 'RM') {
		$role = '12';
	} elseif ($role == 'CDM') {
		$role = '10';
	} elseif ($role == 'LWB') {
		$role = '8';
	} elseif ($role == 'LB') {
		$role = '7';
	} elseif ($role == 'CB') {
		$role = '5';
	} elseif ($role == 'RB') {
		$role = '3';
	} elseif ($role == 'RWB') {
		$role = '2';
	} else {
		$role = '';
	}
	return $role;
}

function curl_connect()
{
	$db = mysqli_connect('localhost','root','root','fifautdb');
	$char = mysqli_set_charset($db, 'utf8');

	// Init curl request
	$curl = curl_init();

	// Set the URL we want to fetch (the player)
	curl_setopt($curl, CURLOPT_URL, "https://utas.s2.fut.ea.com/ut/showofflink/fVzIaJEanKmhP");
	// curl_setopt($curl, CURLOPT_URL, "https://utas.fut.ea.com/ut/showofflink/fVzIaJEanKmhP");

	// Tell curl to return raw data
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	// Tell curl to timeout after a set time
	curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);

	// Tell curl to follow any redirects
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

	// Array of cookies we probably need
	$cookies = array(
	    'EASW_KEY=98953af1-9997-45d2-9df1-4af3bfe2d405;',
	    'EASFC-WEB-SESSION=ag0drfcana6g2566pqsa3vbkd0;',
	    'XSRF-TOKEN=fb9b3ffdece429bea7d3553f9da32d626b42e1a8;',
	);

	// Provide the session cookie
	curl_setopt($curl, CURLOPT_COOKIE, implode(' ', $cookies));

	// Get the raw data from the curl request
	$data = curl_exec($curl);

	// Close the curl connection
	curl_close($curl);

	$fullstring = $data;
}
