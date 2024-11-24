let perguntas = [];
let currentQuestionIndex = 0;
const respostas = {};

document.addEventListener('DOMContentLoaded', () => {
    fetchPerguntas();
});

async function fetchPerguntas() {
    try {
        const response = await fetch('/api/perguntas');
        perguntas = await response.json();
        renderQuestion();
    } catch (error) {
        console.error('Erro ao buscar perguntas:', error);
    }
}

function renderQuestion() {
    const pergunta = perguntas[currentQuestionIndex];
    const perguntasContainer = document.getElementById('perguntasContainer');
    perguntasContainer.innerHTML = '';

    const perguntaDiv = document.createElement('div');
    perguntaDiv.classList.add('mb-4', 'p-4', 'rounded-lg');

    const perguntaTitle = document.createElement('p');
    perguntaTitle.classList.add('text-purple-950', 'text-xl', 'font-montserrat-alternates');
    perguntaTitle.innerText = pergunta.question;
    perguntaDiv.appendChild(perguntaTitle);

    pergunta.options.forEach(option => {
        const optionDiv = document.createElement('div');

        const input = document.createElement('input');
        input.type = 'radio';
        input.id = 'option' + option.id;
        input.name = 'question_' + pergunta.id;
        input.value = option.id;
        input.dataset.nextQuestionId = option.next_question_id; // Store the next question ID in a data attribute
        input.classList.add('mr-2');

        const label = document.createElement('label');
        label.setAttribute('for', 'option' + option.id);
        label.classList.add('text-gray-600', 'text-lg', 'font-montserrat-alternates');
        label.innerText = option.answer;

        optionDiv.classList.add('flex', 'items-center', 'mb-2');
        optionDiv.appendChild(input);
        optionDiv.appendChild(label);

        perguntaDiv.appendChild(optionDiv);
    });

    perguntasContainer.appendChild(perguntaDiv);
}

document.getElementById('continuarBtn').addEventListener('click', (event) => {
    event.preventDefault();

    const selectedOption = document.querySelector(`input[name="question_${perguntas[currentQuestionIndex].id}"]:checked`);
    if (selectedOption) {
        respostas[perguntas[currentQuestionIndex].id] = selectedOption.value;
        const nextQuestionId = selectedOption.dataset.nextQuestionId;

        if (nextQuestionId) {
            currentQuestionIndex = perguntas.findIndex(q => q.id == nextQuestionId);
            renderQuestion();
        } else {
            submitRespostas();
        }
    } else {
        alert("Por favor, selecione uma resposta.");
    }
});

async function submitRespostas() {
    try {
        const response = await fetch('/api/perguntas/respostas', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify(respostas),
        });

        if (response.ok) {
            const { recommendations } = await response.json();
            mostrarTecnologiasRecomendadas(recommendations);
        } else {
            alert('Houve um erro ao enviar as respostas.');
        }
    } catch (error) {
        console.error('Erro ao enviar respostas:', error);
    }
}

function mostrarTecnologiasRecomendadas(recommendations) {
    const perguntasContainer = document.getElementById('perguntasContainer');
    perguntasContainer.innerHTML = '';

    const title = document.createElement('h2');
    title.classList.add('text-purple-950', 'text-2xl', 'font-montserrat-alternates', 'mb-4');
    title.innerText = 'Tecnologias Recomendadas';
    perguntasContainer.appendChild(title);

    const recommendationDiv = document.createElement('div');
    recommendationDiv.classList.add('mb-2', 'p-4', 'rounded-lg', 'bg-gray-200', 'shadow-md');

    const recommendationText = document.createElement('p');
    recommendationText.classList.add('text-purple-950', 'text-xl', 'font-montserrat-alternates');
    recommendationText.innerText = recommendations;
    recommendationDiv.appendChild(recommendationText);

    perguntasContainer.appendChild(recommendationDiv);
}

document.getElementById('startBtn').addEventListener('click', () => {
    document.getElementById('introArea').classList.add('hidden');
    document.getElementById('questionsArea').classList.remove('hidden');
});