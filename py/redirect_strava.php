<?
include('connection.php');

$token = 'BALIOFFICE-3G';

header('Content-Type: application/json');
$data = array();

if(!empty($_GET)) {
	$arget = $_GET;

	if($arget['hub_verify_token'] == $token){
		if($arget['hub_mode'] == 'subscribe'){
			$data['hub.challenge'] = $arget['hub_challenge'];
		}

		echo json_encode($data);
	}
} else {
	$json = file_get_contents('php://input');
	$input = json_decode($json, true);

	if($input['object_type'] == 'activity'){
		switch ($input['aspect_type']) {
			case 'create':
				$data['msg'] = 'create activity';
				break;
			case 'update':
				$data['msg'] = 'update activity';
				break;
			case 'delete':
				$data['msg'] = 'delete activity';
				break;
		}
	} else if ($input['object_type'] == 'athlete'){

	}

	//echo json_encode($data);

	$url_par			= print_r($input, TRUE);
	$php				= $arpost["url"];
	$session_id			= session_id();
	$url_referer		=  $_SERVER['REQUEST_URI'];
	$action				= "-"; //print_r($_SERVER, TRUE);
	
	$sql				= "INSERT INTO s_android_log (devid, ver, userid, sessid, url, url_par, action) VALUE ('$devid', '$ver', '$userid', '$session_id', '$url_referer', '$url_par', '$action');";
	$ret				= mysqli_query($dbhandle, $sql);
}

/*
Array
(
    [aspect_type] => create
    [event_time] => 1549560669
    [object_id] => 1360128428
    [object_type] => activity
    [owner_id] => 134815
    [subscription_id] => 181996
)


Array
(
    [aspect_type] => update
    [event_time] => 1614137544
    [object_id] => 4820853584
    [object_type] => activity
    [owner_id] => 50292397
    [subscription_id] => 181996
    [updates] => Array
        (
            [title] => Morning Ride (STP) + Foto
        )

)
Array
(
    [aspect_type] => delete
    [event_time] => 1614070115
    [object_id] => 4833846484
    [object_type] => activity
    [owner_id] => 51055626
    [subscription_id] => 181996
    [updates] => Array
        (
        )

)


?>