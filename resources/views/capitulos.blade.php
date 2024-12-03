<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capítulos de {{ $bookName }}</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
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
            flex-direction: column;
        }
        h1 { font-size: 2.5em; color: #2c3e50; margin-bottom: 30px; }
        #chapters-list {
            width: 100%;
            max-width: 600px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .chapter {
            background-color: #2ecc71;
            color: white;
            padding: 15px;
            margin-bottom: 10px;
            width: 100%;
            text-align: center;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .chapter:hover { background-color: #27ae60; }
        .chapter:active { background-color: #1f7a41; }
        @media (max-width: 600px) {
            h1 { font-size: 2em; }
            #chapters-list { padding: 20px; }
        }
    </style>
</head>
<body>
    <h1>Capítulos de {{ $bookName }}</h1>
    <div id="chapters-list">
        <!-- Capítulos serão carregados aqui -->
        @for ($i = 1; $i <= 50; $i++) <!-- Exemplo: total de 50 capítulos -->
            <div class="chapter" onclick="window.location.href='/read/{{ $bookName }}/chapter/{{ $i }}'">
                Capítulo {{ $i }}
            </div>
        @endfor
    </div>
</body>
</html>
