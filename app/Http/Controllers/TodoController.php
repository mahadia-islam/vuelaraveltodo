<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::orderBy('created_at','DESC')->where('completed',0)->get();
        return $todos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->save();
        $data = [
            $todo,
            'message' => "todo inserted successfully"
        ];
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        if($todo){
            return $todo;
        }else{
            return [
                "message" => "todo was not found"
            ];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $existingTodo = Todo::find($id);
        if($existingTodo){

            $existingTodo->completed = 1;
            $existingTodo->completed_at = Carbon::now();
            $existingTodo->save();
            $todos = Todo::orderBy('created_at', 'DESC')->where('completed', 0)->get();
            return $todos;

        }else{
            return "Todo was not found";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        if($todo){
            $todo->delete();
            $newTodo = Todo::orderBy('created_at', 'DESC')->where('completed', 0)->get();
            return $newTodo;
        }
        return 'Todo was not found';
    }
}
