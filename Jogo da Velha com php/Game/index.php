<?php

    include 'header.php';
    include 'db_connection.php';

    // VAI MOSTRAR SE O COMENTÁRIO FOI COM SUCESSO!
    function confirmaComentario($message, $type = 'info') {
        echo '<div class="alert alert-' . $type . '" role="alert">' . $message . '</div>';
    }

    // VAI BUSCA NO BANCO DE DADOS OS COMENTARIOS
    function buscarComentario($conn) {
        $comments = array();
        $sql = "SELECT * FROM comentarios";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $comments[] = $row;
            }
        }
        return $comments;
    }

    // VAI INSERIR UM COMENTARIO NO BANCO DE DADOS
    function inserirComentario($conn, $name, $comment) {
        $sql = "INSERT INTO comentarios (nome, comentario) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $name, $comment);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // PROCESSAMENTO DO FORMULARIO DE COMENTARIOS

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_comment"])) {
        $name = $_POST["name"];
        $comment = $_POST["comment"];
        if (!empty($name) && !empty($comment)) {
            if (inserirComentario($conn, $name, $comment)) {
                confirmaComentario("Comentário enviado com sucesso!", "success");
            } else {
                confirmaComentario("Erro ao enviar o comentário. Por favor, tente novamente.", "danger");
            }
        } else {
            confirmaComentario("Por favor, preencha todos os campos do formulário.", "warning");
        }
    }
?>

<body>
    <main>
        <article>
            <h1 class="text-center mb-3">APRESENTAÇÃO DO JOGO</h1>
            <section class="content">
                <p class="mb-3">Este é o Jogo da Velha, um jogo clássico de estratégia para dois jogadores. O objetivo é
                    formar uma linha com três símbolos iguais, seja na horizontal, vertical ou diagonal. Cada jogador
                    marca alternadamente uma casa no tabuleiro, que é composto por uma grade 3x3. As regras são simples,
                    mas a estratégia é fundamental para vencer!</p>
                <h2 class="mb-2">Regras:</h2>
                <ul class="mb-3">
                    <li>O jogador que conseguir formar uma linha com três símbolos iguais vence o jogo.</li>
                    <li>O jogo termina em empate se todas as casas do tabuleiro estiverem preenchidas e nenhum jogador
                        tiver formado uma linha.
                    </li>
                </ul>
                <h2 class="mb-2">Instruções:</h2>
                <p>Para jogar, basta clicar em uma casa vazia do tabuleiro para marcar com o seu símbolo. O jogo alterna
                    entre os jogadores, então preste atenção para criar sua estratégia e vencer!</p>
            </section>
        </article>

        <section class="comments">
            <h3>Comentários</h3>
            <?php
            $comments = buscarComentario($conn);
            if (!empty($comments)) {
                foreach ($comments as $comment) {
                    echo '<div class="comment">';
                    echo '<strong>' . htmlspecialchars($comment['nome']) . ':</strong>';
                    echo '<p>' . htmlspecialchars($comment['comentario']) . '</p>';
                    echo '</div>';
                }
            } else {
                echo "Ainda não há comentários.";
            }
            ?>

            <!-- FORMULÁRIO DO COMENTÁRIO -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Seu Nome:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Seu Comentário:</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                </div>
                <button type="submit" name="submit_comment" class="btn btn-primary">Publicar Comentário</button>
            </form>
        </section>
    </main>
</body>

<?php
    include 'footer.php';
?>
