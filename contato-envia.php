<?php
	ini_set('default_charset','UTF-8');
	
	function mail_utf8($to, $subject = '', $message = '', $header = '') {
		$header_ = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/plain; charset=UTF-8' . "\r\n";
		return @mail($to, '=?UTF-8?B?'.base64_encode($subject).'?=', $message, $header_ . $header);
	}
	
	function checkEmail($string){  
		 $syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';  
		 if(preg_match($syntaxe,$string)){
				return true;
		 } else {
			 return false;  
		 }
	}
	function checkDomain($email){
		$domain = explode('@', $email);
		if (checkdnsrr($domain[1])){
			return true;
		} else {
			return false;  
		}	
	}
	
	//Recupera as informações do Formulário
	$dados = $_POST['dados'];

	// echo "<pre>";
	// print_r($dados);
	// exit();
	
	if(checkEmail($dados['email']) and checkDomain($dados['email'])){
	
		$texto = "Nome: ".$dados['nome']."\n";
		$texto.= "Assunto: ".$dados['assunto']."\n";
		$texto.= "E-mail: ".$dados['email']."\n";
		$texto.= "Cidade: ".$dados['cidade']." / ".$dados['estado']."\n";
		$texto.= "Telefone: (".$dados['ddd'].") ".$dados['fone']."\n\n";
		$texto.= "Whatsapp: (".$dados['ddd'].") ".$dados['whatsapp']."\n\n";
		$texto.= "Mensagem:\n".$dados['msg']."";
		
		//$send = @mail("contato@cesarlopes.com","E-mail enviado pelo site lookjeans.com.br,$texto,"From: ".$dados['email']);
		$send = @mail_utf8("vendas@noxi.com.br","E-mail enviado pelo site noxi.com.br",$texto,"From: ".$dados['email']);
		if($send){
			$erro = "Mensagem enviada com sucesso!";
		} else {
			$erro = "Por favor tente novamente!";
		}
	
	} else {
		$erro = "ERRO! Por favor informe um endereço de e-mail válido!";
	}
	
	if($erro){
		echo "<script>alert('$erro');</script>";
		echo "<script>window.location.href='contato.html'</script>";		
	}
	
	// $redirect = $_SERVER['HTTP_REFERER'];
	// echo '<meta http-equiv="refresh" content="0;URL='.$redirect.'" />';
	header("Location: contato-resposta.html");
	exit;
?>

