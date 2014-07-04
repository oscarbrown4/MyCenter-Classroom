<?php
header('Content-Type: application/json');



if($_SERVER['REQUEST_METHOD'] == 'PUT') {
    parse_str(file_get_contents("php://input"),$post_vars);
    $json = json_encode($post_vars);    
    echo $json;
    exit;
}


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
		'gender' => 'boy',
		'checkedIn' => TRUE,
		'allergies' => array(
			'mockingbirds',
			'your mom',
			),
		'parents' => array(
			array(
				'fname' => 'Oscar',
				'lname' => 'Brown',
				'relationship' => 'Father',
				),
			array(
				'fname' => 'Caitlin',
				'lname' => 'Brown',
				'relationship' => 'Mother',
				),
			),
		),
	array(
		'id' => 2,
		'fname' => 'Charlotte',
		'lname' => 'Brown',
		'gender' => 'girl',
		'checkedIn' => TRUE,
		'parents' => array(
			array(
				'fname' => 'Michael',
				'lname' => 'Brown',
				'relationship' => 'Father',
				),
			array(
				'fname' => 'Rebecca',
				'lname' => 'Brown',
				'relationship' => 'Mother',
				),
			),
		),
	array(
		'id' => 3,
		'fname' => 'George',
		'lname' => 'Brown',
		'gender' => 'boy',
		'checkedIn' => TRUE,
		'parents' => array(
			array(
				'fname' => 'Michael',
				'lname' => 'Brown',
				'relationship' => 'Father',
				),
			array(
				'fname' => 'Rebecca',
				'lname' => 'Brown',
				'relationship' => 'Mother',
				),
			),
		),
	array(
		'id' => 4,
		'fname' => 'Ella',
		'lname' => 'Henley',
		'gender' => 'girl',
		'checkedIn' => FALSE,
		'parents' => array(
			array(
				'fname' => 'Curtis',
				'lname' => 'Henley',
				'relationship' => 'Father',
				),
			array(
				'fname' => 'Colby',
				'lname' => 'Henley',
				'relationship' => 'Mother',
				),
			),
		),
	array(
		'id' => 5,
		'fname' => 'Jackson',
		'lname' => 'Henley',
		'gender' => 'boy',
		'checkedIn' => FALSE,
		'parents' => array(
			array(
				'fname' => 'Curtis',
				'lname' => 'Henley',
				'relationship' => 'Father',
				),
			array(
				'fname' => 'Colby',
				'lname' => 'Henley',
				'relationship' => 'Mother',
				),
			),
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