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


if (PATH(0) == 'login'){
	$return = array('success' => TRUE, 'logincode' => "12345", 'locID' => 1, 'userinfo' => array('fname' => 'Oscar', 'lname' => 'Brown', 'userID' => 1, 'PIN' => 1234));
	echo json_encode($return);
	exit;
}
elseif (PATH(0) == 'getAllStudents'){
	$allChildren = array(
	array(
		'id' => 1,
		'fname' => 'Cinco',
		'lname' => 'Brown',
		),
	array(
		'id' => 5,
		'fname' => 'Jackson',
		'lname' => 'Henley',
		),
	array(
		'id' => 2,
		'fname' => 'Charlotte',
		'lname' => 'Brown',
		),
	array(
		'id' => 3,
		'fname' => 'George',
		'lname' => 'Brown',
		),
	array(
		'id' => 4,
		'fname' => 'Ella',
		'lname' => 'Henley',
		),
	array(
		'id' => 1000,
		'fname' => 'Soso',
		'lname' => 'Anderson',
		)
	);
	
	foreach ($allChildren as $key => $row) {
			$lname[$key] = $row['lname'];
			$fname[$key] = $row['fname'];
		}
	array_multisort($lname, SORT_ASC, $fname, SORT_ASC, $allChildren);
	
	echo json_encode($allChildren);
	exit;
}
elseif (PATH(0) == 'addNewStudent'){
	$return = array(
		'id' => 1000,
		'fname' => 'Soso',
		'lname' => 'Anderson',
		'gender' => 'boy',
		'checkedIn' => FALSE,
		'allergies' => array(
			'stuff',
			'such',
			),
		'parents' => array(
			array(
				'fname' => 'Mike',
				'lname' => 'Anderson',
				'relationship' => 'Father',
				),
			array(
				'fname' => 'Jenny',
				'lname' => 'Anderson',
				'relationship' => 'Mother',
				),
			array(
				'fname' => 'Marsha',
				'lname' => 'Brady',
				'relationship' => 'Aunt',
				),
			array(
				'fname' => 'Louise',
				'lname' => 'Anderson',
				'relationship' => 'Grandmother',
				),
			)
		);
	echo json_encode($return);
	exit;
}



if($_SERVER['REQUEST_METHOD'] == 'PUT') {
    parse_str(file_get_contents("php://input"),$post_vars);
    $json = json_encode($post_vars);    
    echo $json;
    exit;
}

 


$students = array(
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
			array(
				'fname' => 'Thing',
				'lname' => 'Brown',
				'relationship' => 'Worst Aunt Ever',
				),
			array(
				'fname' => 'Nita',
				'lname' => 'Brown',
				'relationship' => 'Grandmother',
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
	array(
		'id' => 6,
		'fname' => 'Oliver',
		'lname' => 'Gadberry',
		'gender' => 'boy',
		'checkedIn' => FALSE,
		'parents' => array(
			array(
				'fname' => 'Julia',
				'lname' => 'Gadberry',
				'relationship' => 'Mother',
				),
			array(
				'fname' => 'Taylor',
				'lname' => 'Gadberry',
				'relationship' => 'Father',
				),
			),
		),
	array(
		'id' => 7,
		'fname' => 'Winn',
		'lname' => 'Schooler',
		'gender' => 'boy',
		'checkedIn' => FALSE,
		'parents' => array(
			array(
				'fname' => 'Amanda',
				'lname' => 'Schooler',
				'relationship' => 'Mother',
				),
			array(
				'fname' => 'Blake',
				'lname' => 'Schooler',
				'relationship' => 'Father',
				),
			),
		),
	array(
		'id' => 8,
		'fname' => 'Jack',
		'lname' => 'Robertson',
		'gender' => 'boy',
		'checkedIn' => FALSE,
		'parents' => array(
			array(
				'fname' => 'Kristina',
				'lname' => 'Robertson',
				'relationship' => 'Mother',
				),
			array(
				'fname' => 'Josh',
				'lname' => 'Robertson',
				'relationship' => 'Father',
				),
			),
		),
	array(
		'id' => 9,
		'fname' => 'Palmer',
		'lname' => 'Thompson',
		'gender' => 'boy',
		'checkedIn' => FALSE,
		'parents' => array(
			array(
				'fname' => 'Britney',
				'lname' => 'Thompson',
				'relationship' => 'Mother',
				),
			array(
				'fname' => 'Jon',
				'lname' => 'Thompson',
				'relationship' => 'Father',
				),
			),
		),
	array(
		'id' => 10,
		'fname' => 'Mary',
		'lname' => 'Turner',
		'gender' => 'girl',
		'checkedIn' => FALSE,
		'parents' => array(
			array(
				'fname' => 'Sharon',
				'lname' => 'Turner',
				'relationship' => 'Mother',
				),
			array(
				'fname' => 'Joe',
				'lname' => 'Turner',
				'relationship' => 'Father',
				),
			),
		),
	);


$classrooms = array(
		array(
			'id' => 1,
			'room' => 1,
			'name' => 'Infant 1',
			),
		array(
			'id' => 2,
			'room' => 2,
			'name' => 'Infant 2',
			),
		array(
			'id' => 3,
			'room' => 3,
			'name' => 'Toddler 1',
			),
		array(
			'id' => 4,
			'room' => 4,
			'name' => 'Toddler 2',
			),
		array(
			'id' => 5,
			'room' => 5,
			'name' => 'Pre-School 1',
			),
		array(
			'id' => 6,
			'room' => 6,
			'name' => 'Pre-School 2',
			),
		array(
			'id' => 7,
			'room' => 7,
			'name' => 'Pre-K 1',
			),
		array(
			'id' => 8,
			'room' => 8,
			'name' => 'Pre-K 2',
			),
		array(
			'id' => 9,
			'room' => 9,
			'name' => 'Kindergarten 1',
			),
		array(
			'id' => 10,
			'room' => 10,
			'name' => 'After School',
			),
		array(
			'id' => 11,
			'room' => 11,
			'name' => 'School Age 1',
			),
		array(
			'id' => 12,
			'room' => 12,
			'name' => 'School Age 2',
			),
		array(
			'id' => 13,
			'room' => 13,
			'name' => 'School Age 3',
			),
		array(
			'id' => 14,
			'room' => 14,
			'name' => 'School Age 4',
			),
		);
		
		
		
if (PATH(0) == 'classrooms') $array = $classrooms;
else $array = $students;		


if (!PATH(1) || PATH(0) == 'students') { echo json_encode($array); exit; }
else {
	$itemID = PATH(1);
	foreach ($array as $item) {
		if ($item['id'] == $itemID) { echo json_encode($item); exit; }
	}
	
}



?>