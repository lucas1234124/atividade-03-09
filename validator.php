<?php

$servername="localhost"; // esse é o nosso servidor
$username="root"; //usuario padrão do servidor local (xampp)
$password=""; //senha do usuario padrão
$db_name="dados"; //nome do banco de dados

$conn= new mysqli($servername, $username, $password, $db_name);

// verifica a conexão com o banco de dados, se deu erro.
if ($conn->connect_error) {
    //die interrompe a execuçao do script, nesse caso, quando der erro
    die("Falha na conexão" . $conn->connect_error);
}

//pegando os dados do formulario pelo post
$email= $_POST["email"];
$senha= $_POST["senha"];


$submit= $_POST["submit"];
// com essa variavel definida, ao ser clicado o 'submit', ele coloca um valor, apenas, por ser clicado


if(isset($submit)) {

    // método que realiza a consulta, com parâmetro de conexão e query
    // obs: esse primeiro email é do banco, depois do = é o que o usuario digitou
    $sql= mysqli_query($conn, "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'");

    //se o numero de células for menor ou igual a 0, vai dar erro
    // a primeira variavel é para verificar a quant de linhas/colunas presentes na tabela do BD
    if(mysqli_num_rows($sql)<=0) {
        header("Location: index.php?login=erro");
        die("Erro. ");
    }
    else {
        header("Location: home.php");
    }

}



?>