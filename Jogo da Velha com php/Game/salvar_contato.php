<?php
// Verifica se todos os campos obrigatórios do formulário foram preenchidos
if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {
    // Captura e valida os valores dos campos do formulário
    $name = trim($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $message = trim($_POST['message']);

    // Verifica se o email é válido
    if (!$email) {
        // Retorna uma mensagem de erro se o email for inválido
        die("Por favor, insira um endereço de email válido.");
    }

    // Captura as plataformas selecionadas, se houver
    $platforms = isset($_POST['platform']) ? implode(', ', $_POST['platform']) : "Nenhuma plataforma selecionada";

    // Captura a fonte, se selecionada
    $source = isset($_POST['source']) ? $_POST['source'] : "Nenhuma fonte selecionada";

    // Configurações do banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "jogo_da_velha";

    // Conexão com o banco de dados usando PDO e prepared statements
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepara a consulta SQL para inserir os dados no banco de dados
        $sql = "INSERT INTO contatos (nome, email, mensagem, plataforma, fonte) VALUES (:name, :email, :message, :platforms, :source)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':platforms', $platforms);
        $stmt->bindParam(':source', $source);

        // Executa a consulta SQL
        $stmt->execute();

        // Retorna os dados do formulário para exibir na modal de sucesso
        echo "Nome: $name<br>Email: $email<br>Mensagem: $message<br>Plataforma: $platforms<br>Fonte: $source";

    } catch(PDOException $e) {
        // Retorna uma mensagem de erro amigável se houver um problema com a consulta SQL
        echo "Erro ao inserir dados: " . $e->getMessage();
    }

    // Fecha a conexão com o banco de dados
    $conn = null;
} else {
    // Retorna uma mensagem de erro se algum campo obrigatório do formulário não foi preenchido
    echo "Por favor, preencha todos os campos obrigatórios do formulário.";
}
?>
