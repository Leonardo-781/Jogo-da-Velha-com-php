<?php
$page = 'contato';
$title = 'Contato';
include 'header.php';

?>

<main>
    <section>
        <h2 class="text-center mb-3">CONTATO</h2>
        <div class="content">
            <form id="contactForm" class="needs-validation" novalidate method="post">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" id="name" name="name" class="form-control mb-3" required>
                <div class="invalid-feedback">Por favor, insira seu nome.</div>
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control mb-3" required>
                <div class="invalid-feedback">Por favor, insira um email válido (example@example.com).</div>
                <label for="message" class="form-label">Mensagem:</label>
                <textarea id="message" name="message" class="form-control mb-3" required></textarea>
                <div class="invalid-feedback">Por favor, insira uma mensagem.</div>

                <label class="form-label">Escolha sua plataforma preferida:</label>
                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <input type="checkbox" id="platform1" name="platform[]" value="PC" class="form-check-input">
                        <label for="platform1" class="form-check-label">PC</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" id="platform2" name="platform[]" value="PS5" class="form-check-input">
                        <label for="platform2" class="form-check-label">PS5</label>
                    </div>
                    <!-- Adicione mais checkboxes conforme necessário -->
                </div>

                <label class="form-label">Como conheceu o jogo:</label>
                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <input type="radio" id="source1" name="source" value="Amigos" class="form-check-input">
                        <label for="source1" class="form-check-label">Amigos</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="source2" name="source" value="Internet" class="form-check-input">
                        <label for="source2" class="form-check-label">Internet</label>
                    </div>
                    <!-- Outras opções de fonte -->
                </div>

                <button type="submit" id="enviar" class="btn btn-success">Enviar</button>
            </form>
        </div>
    </section>
</main>

<!-- Modal de sucesso -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Sucesso!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="successModalBody">
                <!-- Aqui serão exibidos os dados do formulário -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/contato.js"></script>
