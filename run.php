<?php
require_once('./line_class.php');
$channelAccessToken = 'Ntu9HcCgwUtCnRhipkT88r4fx1h3y16m7qnLwtD7imy9z4+kztDiX14YU8Kd3xSYoV8jRe88/7eqtJnAfNMwgGA2gS/NEnLOrLpAoKFbJM2lIqUkbWvCx5SRvBg0BEqJ/zLUOqPm352MhRX0/eWQPgdB04t89/1O/w1cDnyilFU='; //Channel access token
$channelSecret = '400d226b31448e7ad3d965b907532c8a';//Channel secret

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$replyToken = $client->parseEvents()[0]['replyToken'];
$message 	= $client->parseEvents()[0]['message'];
$msg_type = $message['type'];
$botname = "KerangAjaib"; //Nama bot

function send($input, $rt){
    $send = array(
        'replyToken' => $rt,
        'messages' => array(
            array(
                'type' => 'text',					
                'text' => $input
            )
        )
    );
    return($send);
}

function jawabs(){
    $list_jwb = array(
		'Ya',
		'Tidak',
		'Bisa jadi',
		'Mungkin',
		'Tentu tidak',
		'Coba tanya lagi'
		);
    $jaws = array_rand($list_jwb);
    $jawab = $list_jwb[$jaws];
    return($jawab);
}

if($msg_type == 'text'){
    $pesan_datang = strtolower($message['text']);
    $filter = explode(' ', $pesan_datang);
    if($filter[0] == 'apakah') {
        $balas = send(jawabs(), $replyToken);
    } else {}
} else {}

if(isset($balas)){
    $client->replyMessage($balas); 
    $result =  json_encode($balas);
    file_put_contents($botname.'.json',$result);
}
