<?php
header('Content-Type: application/json');


function PATH($num = FALSE) {
	global $PATH;
	if (!is_array($PATH)) {
		$URL = parse_url("http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);
		$PATH=explode('/',substr_replace($URL["path"],'',0,1));
		array_shift($PATH);
	}
	if ($num === FALSE) return $PATH;
	elseif ($num>=0 && isset($PATH[$num])) return $PATH[$num];
	return FALSE;
}

$children = array(
	array(
		'id' => 1,
		'fname' => 'Cinco',
		'lname' => 'Brown',
		'checkedIn' => TRUE,
		),
	array(
		'id' => 2,
		'fname' => 'Charolotte',
		'lname' => 'Brown',
		'checkedIn' => TRUE,
		),
	array(
		'id' => 3,
		'fname' => 'George',
		'lname' => 'Brown',
		'checkedIn' => TRUE,
		),
	array(
		'id' => 4,
		'fname' => 'Ella',
		'lname' => 'Henley',
		'checkedIn' => FALSE,
		),
	array(
		'id' => 5,
		'fname' => 'Jackson',
		'lname' => 'Henley',
		'checkedIn' => FALSE,
		),		
	);


$parents = array(
	array(
		'parentID' => 1,
		'fname' => 'Oscar',
		'lname' => 'Brown',
		'childID' => 1,
		'relationship' => 'Father',
		),
	array(
		'parentID' => 2,
		'fname' => 'Caitie',
		'lname' => 'Brown',
		'childID' => 1,
		'relationship' => 'Mother',
		),
	array(
		'parentID' => 3,
		'fname' => 'Michael',
		'lname' => 'Brown',
		'childID' => 2,
		'relationship' => 'Father',
		),
	array(
		'parentID' => 3,
		'fname' => 'Michael',
		'lname' => 'Brown',
		'childID' => 3,
		'relationship' => 'Father',
		),
	array(
		'parentID' => 4,
		'fname' => 'Rebecca',
		'lname' => 'Brown',
		'childID' => 2,
		'relationship' => 'Mother',
		),
	array(
		'parentID' => 4,
		'fname' => 'Rebecca',
		'lname' => 'Brown',
		'childID' => 3,
		'relationship' => 'Mother',
		),
	array(
		'parentID' => 5,
		'fname' => 'Curtis',
		'lname' => 'Henley',
		'childID' => 4,
		'relationship' => 'Father',
		),
	array(
		'parentID' => 5,
		'fname' => 'Curtis',
		'lname' => 'Henley',
		'childID' => 5,
		'relationship' => 'Father',
		),
	array(
		'parentID' => 6,
		'fname' => 'Colby',
		'lname' => 'Henley',
		'childID' => 4,
		'relationship' => 'Mother',
		),
	array(
		'parentID' => 6,
		'fname' => 'Colby',
		'lname' => 'Henley',
		'childID' => 5,
		'relationship' => 'Mother',
		),
	);

if (PATH(0) == 'student' || PATH(0) == 'students') $array = $children;
elseif (PATH(0) == 'prnt') $array = $parents;

if (!PATH(1)) { echo json_encode($array); exit; }
else {
	$itemID = PATH(1);
	foreach ($array as $item) {
		if ($item['id'] == $itemID) { echo json_encode($item); exit; }
	}
	
}



?>