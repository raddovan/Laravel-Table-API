<?php

namespace App\Http\Controllers;

use App\Poll;
use App\Http\Resources\Poll as PollResource;
use Illuminate\Http\Request;
use Validator;

class PollsController extends Controller
{
public function index(Request $request)
{
     $data = $request->json()->all();
     $poll = Poll::query();
     if(!empty($data['filters'])){
         foreach($data['filters'] as $item){
            $poll->where($item['field'],'LIKE',"%{$item['value']}%");
         }
        }

    if($data['orderDirection']){
     return response()->json($poll->orderBy($data['sortBy'], $data['orderDirection'])->paginate($data['per_page']), 200);
    }
    
    return response()->json($poll->paginate($data['per_page']), 200);
}
    public function show($id)
    {
        $poll = Poll::with('questions')->findOrFail($id);
        $response['poll'] = $poll;
        $response['questions'] = $poll->questions;
        return response()->json($response, 200);
    }

    public function store(Request $request) 
    {
        $rules = [
            'title' => 'required|max:255',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $poll = Poll::create($request->all());
        return response()->json($poll, 201);
    }

    public function update(Request $request, Poll $poll) 
    {
        $poll->update($request->all());
        return response()->json($poll, 200);
    }

    public function delete(Request $request, Poll $poll)
    {
        $poll->delete();
        return response()->json(null, 204);
    }

    public function errors() 
    {
        return response()->json(['msg' => 'Payment is required.'], 501);
    }

    public function questions(Request $request, Poll $poll) 
    {
        $questions = $poll->questions;
        return response()->json($questions, 200);
    }
}
