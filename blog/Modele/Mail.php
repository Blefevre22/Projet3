<?php
class Mail
{
	public function sendMail(User $user, $msg)
	{
		//Configuration mail
		require('phpmailer/PHPMailerAutoload.php');
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->IsHTML(true);
		$mail->Host = 'smtp.auth.orange-business.com';
		$mail->SMTPAuth   = true;
		$mail->Port = 587; // Par défaut
		$mail->CharSet = 'UTF-8';
		// Authentification
		$mail->Username = "xerox@lenormant.fr";
		$mail->Password = "mont12345";
		// Expéditeur
		$mail->SetFrom('xerox@lenormant.fr', 'Jean Forteroche le blog');
		// Destinataire
		$mail->AddAddress($user->user_mail());
		
		if($msg == "newAccount"){
			$mailNewAccount =  $this->newAccount($user);
			$title = $mailNewAccount['title'];
			$msg = $mailNewAccount['body'];
		}elseif($msg == "recoveryPassword"){
			$mailRecovery =  $this->recoveryPassword($user);
			$title = $mailRecovery['title'];
			$msg = $mailRecovery['body'];
		}else{
			$mailContact =  $this->mailContact($user, $msg);
			$title = $mailContact['title'];
			$msg = $mailContact['body'];
			// Destinataire
			$mail->AddAddress("benoit.lefevre22@gmail.com");
		}
		//Titre du message
		$mail->Subject = $title;	
		//Corps du message
		$mail->MsgHTML($msg);
		// Destinataire
		$mail->AddAddress($user->user_mail());
		// Envoi du mail avec gestion des erreurs
		if(!$mail->Send()) {
			echo 'Erreur : ' . $mail->ErrorInfo;
		}
	}
	public function newAccount(User $user)
	{
		$mail=[
			"title" => "Jean Forteroche le blog",
			"body" =>"<p>Félicitation <b>".$user->user_firstName()." ".$user->user_lastName()."</b>, votre compte est créé.</p>
			<p>Je suis ravi de vous compter parmi nous et j'espère que nous pourrons partager autour des divers articles publiés.<p>
			<p>Vous pouvez dès a présent utiliser la totalité des fonctionnalités du site. Tel que la gestion de votre compte et l'ajout de commentaire sur les articles !</p>
			<p><a href='http://78.118.159.31/index.php'>Lien</a></p>
			<p>A tout de suite sur le site.<p>
			<p>Jean Forteroche</p>"
		];
		return $mail;
	}

	public function recoveryPassword(User $user)
	{
		//Création d'une clé de vérification
		$char = 'abcdefghijklmnopqrstuvwxyz0123456789';
		$security = str_shuffle($char);
		$recoveryFile = fopen("phpmailer/".$security,"w" );
		fwrite($recoveryFile, $user->user_mail());
		fclose($recoveryFile);
		$mail=[
			"title" => "Jean Forteroche le blog",
			"body" =>"<p>Voici le lien pour modifier votre mot de passe :</p>
			<p><a href='http://78.118.159.31/index.php?action=changePassword&controller=Controller&id=".$security."'>Lien</a></p>
			<p>Jean Forteroche</p>"
		];
		return $mail;
	}
	public function mailContact(User $user, $msg)
	{
		$mail=[
			"title" => "Demande de ".$user->user_login(),
			"body" =>"<p>".$msg."</p>
			<p>Demande de ".$user->user_login().", adresse mail : ".$user->user_mail()."</p>"
		];
		return $mail;
	}
}