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
    perguntaDiv.classList.add('mb-4', 'border-lg', 'p-4', 'rounded-2xl', 'shadow-lg');

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
    } else {
        alert("Por favor, selecione uma resposta.");
        return;
    }

    if (currentQuestionIndex < perguntas.length - 1) {
        currentQuestionIndex++;
        renderQuestion();
    } else {
        submitRespostas();
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
            alert('Respostas enviadas com sucesso!');
        } else {
            alert('Houve um erro ao enviar as respostas.');
        }
    } catch (error) {
        console.error('Erro ao enviar respostas:', error);
    }
}

document.getElementById('startBtn').addEventListener('click', () => {
    document.getElementById('introArea').classList.add('hidden');
    document.getElementById('questionsArea').classList.remove('hidden');
});
