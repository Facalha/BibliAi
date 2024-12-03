<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros da Bíblia</title>
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
            align-items: flex-start;
            flex-direction: column;
            height: 100vh;
            padding: 20px;
            overflow: auto; /* Permite rolar caso o conteúdo ultrapasse a tela */
        }
        h1 {
            font-size: 2.5em;
            color: #2c3e50;
            margin-bottom: 20px;
            text-align: center;
        }
        #books-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); /* Layout flexível */
            gap: 20px;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .book {
            background-color: #3498db;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-transform: capitalize; /* Deixa a primeira letra maiúscula */
            font-size: 1.1em;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80px; /* Limita a altura para manter a consistência */
        }
        .book:hover {
            background-color: #2980b9;
        }
        .book:active {
            background-color: #1a5a8c;
        }
        @media (max-width: 600px) {
            h1 {
                font-size: 2em;
            }
        }
    </style>
</head>
<body>
    <h1>Livros da Bíblia</h1>
    <div id="books-list">
        <!-- Os livros serão carregados dinamicamente -->
        @foreach ($books as $book)
            <div class="book" onclick="window.location.href='/chapters/{{ $book }}'">
                {{ $book }}
            </div>
        @endforeach
    </div>
</body>
</html>
