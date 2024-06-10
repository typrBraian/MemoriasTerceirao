<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "bancodd.sql";

// Crie uma conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifique a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifique se o botão de login foi pressionado
if(isset($_POST['login'])){

    // Recupere os dados inseridos pelo usuário
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Consulta SQL para verificar se os dados de login correspondem aos dados no banco de dados
    $sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    
    // Verifique se há resultados e se o login foi bem-sucedido
    if ($result->num_rows > 0) {
        // Login bem-sucedido, redirecione o usuário para a página inicial, por exemplo
        header("Location: pagina_inicial.php");
        exit();
    } else {
        // Login falhou, exiba uma mensagem de erro, por exemplo
        echo "Login falhou. Verifique seu nome de usuário e senha.";
    }
}

// Feche a conexão
$conn->close();
?>