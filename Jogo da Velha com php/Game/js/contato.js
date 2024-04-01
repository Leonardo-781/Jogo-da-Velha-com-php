// Adicionando evento de submit ao formulário
document.getElementById("contactForm").addEventListener("submit", function(event) {
    // Previne o comportamento padrão de submit do formulário
    event.preventDefault();
    // Valida o formulário usando a validação nativa do Bootstrap
    if (event.target.checkValidity()) {
        // Obtém os dados do formulário
        var formData = new FormData(event.target);

        // Envia os dados do formulário para o servidor usando AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "salvar_contato.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Exibe a modal de sucesso com os dados do formulário
                    document.getElementById('successModalBody').innerHTML = xhr.responseText;
                    var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                    successModal.show();
                    // Limpa o formulário após um breve atraso
                    setTimeout(function() {
                        document.getElementById("contactForm").reset();
                    }, 1500);
                } else {
                    // Exibe uma mensagem de erro se houver um problema no servidor
                    alert('Ocorreu um erro ao processar sua solicitação. Por favor, tente novamente mais tarde.');
                }
            }
        };
        xhr.send(formData);
    }
    // Adiciona a classe de validação ao formulário
    event.target.classList.add('was-validated');
});
