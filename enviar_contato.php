<?php 

// Recebendo os dados passados pela página "orcamento.php"


$recebenome = $_POST["nome"];

$recebeendereco = $_POST["endereco"];

$recebecidade = $_POST["cidade"];

$recebefone  = $_POST["fone"];

$recebemail = $_POST["email"];

$recebemensagem  = $_POST["mensagem"];





// Definindo os cabeçalhos do e-mail

$headers = "Content-type:text/html; charset=iso-8859-1";




// Vamos definir agora o destinatário do email, ou seja, VOCÊ ou SEU CLIENTE



$para = "vcordeiro2009@hotmail.com.br";



// Definindo o aspecto da mensagem



$mensagem   .= "<h3>De:</h3> ";
$mensagem  .= $recebenome ;

$mensagem  .= "<h3>Endereço:</h3>";
$mensagem  .= $recebeendereco ; 

$mensagem  .= "<h3>Cidade:</h3>";
$mensagem  .= $recebecidade ; 

$mensagem  .= "<h3>Tefefone:</h3>";
$mensagem  .= $recebefone ; 

$mensagem  .= "<h3>E-Mail:</h3>";
$mensagem  .= $recebemail ;

$mensagem  .= "<h3>Mensagem:</h3>";
$mensagem  .= $recebemensagem;





// Enviando a mensagem para o destinatário



$envia =  mail($para,"Página de Contato do Site",$mensagem,$headers);

  

// Envia um e-mail para o remetente, agradecendo a visita no site, e dizendo que em breve o e-mail será respondido.



$mensagem2  = "<p>Olá <strong>" . $recebenome . "</strong>. Agradeçemos sua visita e a oportunidade de recebermos o seu contato. Em até 48 horas você receberá no e-mail fornecido a resposta para sua questão.</p>";

$mensagem2 .= "<p>Observação - Não é necessário responder esta mensagem.</p>";



$envia =  mail($recebemail,"Sua mensagem foi recebida!",$mensagem2,$headers);





// Exibe na tela a mensagem de sucesso, e depois redireciona devolta para a página de contato.

  

echo "Mensagens Recebidas com Sucesso! Confira seu lixo eletrônico";

echo "<meta http-equiv='refresh' content='2;URL=index.php'>";

