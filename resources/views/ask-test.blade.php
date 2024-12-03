<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teste de Pergunta</title>
</head>
<body>
    <form action="/ask" method="POST">
        @csrf
        <label for="question">Pergunta:</label>
        <input type="text" name="question" id="question" required>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
