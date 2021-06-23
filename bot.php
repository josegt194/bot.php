<?php 
$token = '1740256001:AAG_6abUwLFRrzx69GsY4W-I4orvXkVtX4k';
$website = 'https://api.telegram.org/bot' .$token;

$input = file_get_contents('php://input');
$update = json_decode($input, TRUE);

$ChatId = $update['message']['chat'][id];
$message = $update['message']['text'];

switch (message) {
	case '/start';
		$response = 'Hola👋, bienvenid@! gracias por usarme, Mi creador es @Jose_Tersek. Usa /cmds para ver la lista de comandos!';
		sendMessage($ChatId, $response);
		break;
	case '/info';
		$response = 'Hola! Soy @PremiunKingBot y estoy en proceso de desarrollo...';
		sendMessage($ChatId, $response);
		break;
	case '/reload';
		$response = 'Servidor reinicaido✅ Si tienes algun problema contacta a @Jose_Tersek';
		sendMessage($ChatId, $response);
		break;
	case '/cmds';
		$response = 'Lista de comandos
					/info : Informacion del bot
					/reload : Reinicio del bot
					/help : Ayuda del bot
					/donar : Para donar al bot
					/add : Invitar amigos';
		sendMessage($ChatId, $response);
		break;
	case '/help';
		$response = 'Muy bien, en que necesitas ayuda?
					Para ver la lista de comandos usa /cmds
					Quieres ser usuario premium? Contacta a @Jose_Tersek
					Quieres donar al bot? Usa /donar';
		sendMessage($ChatId, $response);
	case '/donar';
		$response = 'Para donar al bot, puedes aportar cualquier cantidad a mi cuenta de Paypal';
		sendMessage($ChatId, $response);
		break;
	case '/add';
		$response = 'Para invitar a mas amigos a que usen este bot enviale este link! https://t.me/PremiunKingBot';
		sendMessage($ChatId, $response);
		break;
	default;
		$response = 'Hola👋, lamentablemente no te he entendido, por favor usa los comandos para poder entenderte. Si no sabes cuales son usa /cmds';
		sendMessage($ChatId, $response);
		break;
}

function sendMessage($ChatId, $response) {

	$url = $GLOBALS['website'].'/sendMessage?chat_id='.$ChatId.'&parse_mode=HTML&text'.urlcode($response);
	file_get_contents($url);
}
?>
