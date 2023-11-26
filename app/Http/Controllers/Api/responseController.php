<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Response;
use App\Models\referenceQuestionAndResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;


class responseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($question_id)
    {
        try {
            $responses = Response::where('question_id', $question_id)->get();
            return response(['responses' => $responses], SymfonyResponse::HTTP_OK);
        } catch (\Exception $e) {
            $responseMessage = 'Erro ao realizar a busca por respostas: ' . $e->getMessage();
            return response(['error' => $responseMessage], SymfonyResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = new Response();
    
        try {
            $response->question_id = $request->question_id;
            $response->title = $request->title;
            $response->description = $request->description;
            $response->save();
            return response(['message' => 'Dados salvos com sucesso'], SymfonyResponse::HTTP_OK);
        } catch (\Exception $e) {
            $responseMessage = 'Erro ao salvar dados: ' . $e->getMessage();
            return response(['error' => $responseMessage], SymfonyResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
