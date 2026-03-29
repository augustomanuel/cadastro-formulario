<?php

// echo "<pre>";   
// // print_r($_GET);
// print_r($_POST);

$nomeCompletoExiste = isset($_POST["nome_completo"]);
$emailCompletoExiste = isset($_POST["email_completo"]);
$idadeExiste = isset($_POST["idade_completa"]);

if(!$nomeCompletoExiste){
    echo("Nome completo não definido");
}

if(!$emailCompletoExiste){
    echo("Email não definido");
}

if(!$idadeExiste){
    echo("idade não definida");
}

$nomeCompleto = $_POST["nome_completo"];
$emailCompleto = $_POST["email_completo"];
$idadelCompleta = $_POST["idade_completa"];

if(strlen($nomeCompleto) < 3 || strlen($nomeCompleto) > 21){
    echo("o nome nao pode ter menos de 3 carateres e nao pode exceder a 20 caracteres");
}

$validacaoEmail = filter_var($emailCompleto, FILTER_VALIDATE_EMAIL);
if($validacaoEmail === false){
        echo("Email invalido");
    }

if($idadelCompleta < 1 || $idadelCompleta > 200){
    echo("Idade invalida");
}
$nomeSanitizado = htmlspecialchars($nomeCompleto);

$filename = __DIR__ . DIRECTORY_SEPARATOR . "arquivo.txt";

$arquivoExiste = file_exists($filename);

file_put_contents($filename, "Nome: " . "Email: ". "idade: " . "<br/>" ,FILE_APPEND );

file_put_contents($filename, " " . $nomeCompleto . " " . $emailCompleto . " "  . $idadelCompleta , FILE_APPEND );

$informacao = file_get_contents($filename);

echo $informacao;
