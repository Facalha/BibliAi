<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;

//BIBLIA

Route::get('/livros', function () {
    $books = [
        'Gênesis', 'Êxodo', 'Levítico', 'Números', 'Deuteronômio', 'Josué', 'Juízes',
        'Rute', '1 Samuel', '2 Samuel', '1 Reis', '2 Reis', '1 Crônicas', '2 Crônicas',
        'Esdras', 'Neemias', 'Ester', 'Jó', 'Salmos', 'Provérbios', 'Eclesiastes', 'Cânticos',
        'Isaías', 'Jeremias', 'Lamentações', 'Ezequiel', 'Daniel', 'Oséias', 'Joel', 'Amós',
        'Obadias', 'Jonas', 'Miquéias', 'Naum', 'Habacuque', 'Sofonias', 'Ageu', 'Zacarias', 'Malaquias'
    ];

    return view('livros', compact('books'));
});

// Rota para exibir os capítulos de um livro
Route::get('/chapters/{bookName}', function ($bookName) {
    return view('capitulos', compact('bookName'));
});

// Rota para exibir o conteúdo de um capítulo específico
Route::get('/read/{bookName}/chapter/{chapterNumber}', function ($bookName, $chapterNumber) {
    return view('leitura', compact('bookName', 'chapterNumber'));
});

//CHATBOT

Route::get('/', function () {
    return view('chatbot');
});

Route::post('/ask', [ChatbotController::class, 'askQuestion']);

Route::get('/ask-test', function () {
    return view('ask-test');
});

