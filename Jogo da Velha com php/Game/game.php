<?php
$page = 'jogo';
$title = 'Jogo';
include 'header.php';
?>
<main>
    <section>
        <h2 class="text-center mb-3">JOGO</h2>
        <div class="content" id="game">
            <div class="container-jogo">
                <div class="estado-acao">
                    <div class="estado">× é o próximo</div>
                    <div class="reiniciar">Reiniciar</div>
                </div>
                <div class="grade-jogo">
                    <div class="casa-jogo"></div>
                    <div class="casa-jogo"></div>
                    <div class="casa-jogo"></div>
                    <div class="casa-jogo"></div>
                    <div class="casa-jogo"></div>
                    <div class="casa-jogo"></div>
                    <div class="casa-jogo"></div>
                    <div class="casa-jogo"></div>
                    <div class="casa-jogo"></div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include 'footer.php'; ?>
