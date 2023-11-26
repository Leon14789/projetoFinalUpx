<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
class questionController extends Controller
{
    
    public function index()
    {
        $user = auth()->user();
        $questions = Question::paginate(100);
        $userId = Auth::id();

        return response($questions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $question = new Question();

           
        

        try {
            $question->user_id = $request->user_id;
            $question->title = $request->title;
            $question->description = $request->description;
            $question->save();
            return response(['message' => 'Dados salvos com sucesso'], Response::HTTP_OK);

        } catch (\Exception $e) {
            $responseMessage = 'Erro ao salvar dados: ' . $e->getMessage();
            return response(['error' => $responseMessage], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    { 
        $question = Question::find($id);

        if ($question) {
            return response([
                'id' => $question->id,
                'title' => $question->title,
                'description' => $question->description,
                'created_at' => $question->created_at,
                'updated_at' => $question->updated_at,
            ]);
        } else {
            return response(['error' => 'Pergunta não encontrada.'], 404);
        }
    }

    public function myQuestions($userId) {
        
        $questions = Question::where('user_id', $userId)->paginate(10);
        return response()->json($questions);
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
