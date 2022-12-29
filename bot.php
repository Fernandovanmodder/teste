<?php

 $input = file_get_contents('php://input');
 $update = json_decode($input);
 $message = $update->message;
 $chat_id = $message->chat->id;
 $message_id = $update->message->message_id;
 $tipo = $message->chat->type;
 $re = $message->message_id;
 $text = $message->text;
 $token = '5953130461:AAHDZWAsP-YFO8v6QUFlIeMqmZVmrSK9Bf8';
 $data = $update->callback_query->data;
 $cmid = $update->callback_query->message->message_id;
 $ccid = $update->callback_query->message->chat->id;
 $cuid = $update->callback_query->message->from->id;
 $cqid = $update->callback_query->id;


$boasvindas = "**Oi**";


if($text == '/start' || $texy == '.start' || $text == '!start'){
    if($tipo == 'private'){
        bot("sendMessage",["chat_id"=> $chat_id,"text" => "Eu só funciono nos Canais **Carders do 7**","reply_to_message_id"=> $message_id,"parse_mode" => 'Markdown']);
    }else{
  $btn = json_encode([
    'inline_keyboard'=>[
    [['text'=>"🔱 DEV NUBI 🔱",'url'=>"https://t.me/vanmodder"]]]
    ]);
    
 bot("sendMessage",["chat_id"=> $chat_id,"reply_markup" => $btn ,"text" => "*Ops, Estou em Manutencao no momento!*","reply_to_message_id"=> $message_id,"parse_mode" => 'Markdown']);
}
}

function bot($metodo, $parametros){
    $token = "5953130461:AAHDZWAsP-YFO8v6QUFlIeMqmZVmrSK9Bf8";
    $options = array(
  'http' => array(
  'method'  => 'POST',
  'content' => json_encode($parametros),
  'header'=>  "Content-Type: application/json\r\n" .
	            "Accept: application/json\r\n"
			 )
			);

   $context  = stream_context_create( $options );
   return file_get_contents('https://api.telegram.org/bot'.$token.'/'.$metodo, true, $context );
}


?>
