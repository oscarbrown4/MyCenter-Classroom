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


if (!PATH(1)) { echo json_encode($students); exit; }
else {
	$itemID = PATH(1);
	foreach ($students as $item) {
		if ($item['id'] == $itemID) { echo json_encode($item); exit; }
	}
	
}



?>