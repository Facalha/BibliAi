<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ChatbotController extends Controller
{
    public function askQuestion(Request $request)
    {
        $question = $request->input('question');
        if (!$question) {
            return response()->json(['error' => 'Pergunta é obrigatória.'], 400);
        }

        $apiKey = env('OPENAI_API_KEY');
        $client = new Client();

        try {
            // API Endpoint para chat/completions usando o modelo gpt-3.5-turbo ou gpt-4
            $response = $client->post('https://api.openai.com/v1/chat/completions', [
                'headers' => [
                    'Authorization' => "Bearer $apiKey",
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'gpt-3.5-turbo',  // ou 'gpt-4' se você preferir usar GPT-4
                    'messages' => [
                        ['role' => 'system', 'content' => 'Você é um assistente útil.'],
                        ['role' => 'user', 'content' => "Questão teológica: $question"]
                    ],
                    'max_tokens' => 200,
                    'temperature' => 0.7,
                ],
            ]);

            $data = json_decode($response->getBody(), true);
            return response()->json(['answer' => $data['choices'][0]['message']['content'] ?? 'Sem resposta.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao se conectar com a API. ' . $e->getMessage()], 500);
        }
    }
}
