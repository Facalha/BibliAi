<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BíbliAí</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background: #f0f4f8;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            padding: 20px;
        }
        h1 {
            font-size: 2.5em;
            color: #2c3e50;
            margin-bottom: 30px;
        }
        #chatbox {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        textarea {
            width: 100%;
            height: 120px;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            font-size: 1em;
            resize: none;
            outline: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        textarea:focus {
            border-color: #3498db;
        }
        button {
            padding: 12px 24px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 1.1em;
            transition: background-color 0.3s;
            width: 100%;
            max-width: 250px;
        }
        button:hover {
            background-color: #2980b9;
        }
        .response {
            margin-top: 20px;
            padding: 20px;
            background-color: #ecf0f1;
            border: 1px solid #ddd;
            border-radius: 10px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            font-size: 1.1em;
            color: #2c3e50;
            min-height: 100px;
            text-align: left;
        }
        .loading {
            font-style: italic;
            color: #7f8c8d;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 2em;
            }
            #chatbox {
                padding: 20px;
            }
            textarea {
                font-size: 0.9em;
            }
            button {
                font-size: 1em;
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>
    <div id="chatbox">
        <h1>BíbliAí</h1>
        <textarea id="question" placeholder="Digite sua pergunta teológica aqui..."></textarea>
        <button onclick="askQuestion()">Perguntar</button>
        <div id="response" class="response"></div>
    </div>

    <script>
        function askQuestion() {
            const question = document.getElementById('question').value;
            const responseDiv = document.getElementById('response');
            responseDiv.innerHTML = "<div class='loading'>Carregando...</div>";

            // Garantir que a pergunta não está vazia
            if (!question.trim()) {
                responseDiv.innerHTML = "<div class='loading'>Por favor, digite uma pergunta.</div>";
                return;
            }

            axios.post('/ask', { question })
                .then(response => {
                    responseDiv.innerHTML = response.data.answer || 'Sem resposta.';
                })
                .catch(error => {
                    responseDiv.innerHTML = "<div class='loading'>Erro ao processar sua pergunta.</div>";
                });
        }
    </script>
</body>
</html>
