// Elementos HTML
const statusDiv = document.querySelector('.estado');
const resetDiv = document.querySelector('.reiniciar');
const celulasDiv = document.querySelectorAll('.casa-jogo');

// Constantes do jogo
const simboloX = '×';
const simboloO = '○';

// Variáveis do jogo
let jogoAtivo = true;
let vezDoX = true;

// Funções
const letraParaSimbolo = (letra) => letra === 'x' ? simboloX : simboloO;

const lidarComVitoria = (letra) => {
  jogoAtivo = false;
  if (letra === 'x') {
    statusDiv.innerHTML = `${letraParaSimbolo(letra)} Ganhou!`;
  } else {
    statusDiv.innerHTML = `<span>${letraParaSimbolo(letra)} ganhou!</span>`;
  }
};

const verificarStatusJogo = () => {
  const superiorEsquerdo = celulasDiv[0].classList[1];
  const superiorMeio = celulasDiv[1].classList[1];
  const superiorDireito = celulasDiv[2].classList[1];
  const meioEsquerdo = celulasDiv[3].classList[1];
  const meioMeio = celulasDiv[4].classList[1];
  const meioDireito = celulasDiv[5].classList[1];
  const inferiorEsquerdo = celulasDiv[6].classList[1];
  const inferiorMeio = celulasDiv[7].classList[1];
  const inferiorDireito = celulasDiv[8].classList[1];

  // Verificar vencedor
  if (superiorEsquerdo && superiorEsquerdo === superiorMeio && superiorEsquerdo === superiorDireito) {
    lidarComVitoria(superiorEsquerdo);
    celulasDiv[0].classList.add('venceu');
    celulasDiv[1].classList.add('venceu');
    celulasDiv[2].classList.add('venceu');
  } else if (meioEsquerdo && meioEsquerdo === meioMeio && meioEsquerdo === meioDireito) {
    lidarComVitoria(meioEsquerdo);
    celulasDiv[3].classList.add('venceu');
    celulasDiv[4].classList.add('venceu');
    celulasDiv[5].classList.add('venceu');
  } else if (inferiorEsquerdo && inferiorEsquerdo === inferiorMeio && inferiorEsquerdo === inferiorDireito) {
    lidarComVitoria(inferiorEsquerdo);
    celulasDiv[6].classList.add('venceu');
    celulasDiv[7].classList.add('venceu');
    celulasDiv[8].classList.add('venceu');
  } else if (superiorEsquerdo && superiorEsquerdo === meioEsquerdo && superiorEsquerdo === inferiorEsquerdo) {
    lidarComVitoria(superiorEsquerdo);
    celulasDiv[0].classList.add('venceu');
    celulasDiv[3].classList.add('venceu');
    celulasDiv[6].classList.add('venceu');
  } else if (superiorMeio && superiorMeio === meioMeio && superiorMeio === inferiorMeio) {
    lidarComVitoria(superiorMeio);
    celulasDiv[1].classList.add('venceu');
    celulasDiv[4].classList.add('venceu');
    celulasDiv[7].classList.add('venceu');
  } else if (superiorDireito && superiorDireito === meioDireito && superiorDireito === inferiorDireito) {
    lidarComVitoria(superiorDireito);
    celulasDiv[2].classList.add('venceu');
    celulasDiv[5].classList.add('venceu');
    celulasDiv[8].classList.add('venceu');
  } else if (superiorEsquerdo && superiorEsquerdo === meioMeio && superiorEsquerdo === inferiorDireito) {
    lidarComVitoria(superiorEsquerdo);
    celulasDiv[0].classList.add('venceu');
    celulasDiv[4].classList.add('venceu');
    celulasDiv[8].classList.add('venceu');
  } else if (superiorDireito && superiorDireito === meioMeio && superiorDireito === inferiorEsquerdo) {
    lidarComVitoria(superiorDireito);
    celulasDiv[2].classList.add('venceu');
    celulasDiv[4].classList.add('venceu');
    celulasDiv[6].classList.add('venceu');
  } else if (superiorEsquerdo && superiorMeio && superiorDireito && meioEsquerdo && meioMeio && meioDireito && inferiorEsquerdo && inferiorMeio && inferiorDireito) {
    jogoAtivo = false;
    statusDiv.innerHTML = 'Empatou!';
  } else {
    vezDoX = !vezDoX;
    if (vezDoX) {
      statusDiv.innerHTML = `${simboloX} é o próximo`;
    } else {
      statusDiv.innerHTML = `<span>${simboloO} é o próximo</span>`;
    }
  }
};

// Manipuladores de Eventos
const lidarComReinicio = () => {
  vezDoX = true;
  statusDiv.innerHTML = `${simboloX} é o próximo`;
  for (const celulaDiv of celulasDiv) {
    celulaDiv.classList.remove('x');
    celulaDiv.classList.remove('o');
    celulaDiv.classList.remove('venceu');
  }
  jogoAtivo = true;
};

const lidarComCliqueCelula = (e) => {
  const listaClasses = e.target.classList;

  if (!jogoAtivo || listaClasses[1] === 'x' || listaClasses[1] === 'o') {
    return;
  }

  if (vezDoX) {
    listaClasses.add('x');
    verificarStatusJogo();
  } else {
    listaClasses.add('o');
    verificarStatusJogo();
  }
};

// Listeners de Eventos
resetDiv.addEventListener('click', lidarComReinicio);

for (const celulaDiv of celulasDiv) {
  celulaDiv.addEventListener('click', lidarComCliqueCelula)
}
