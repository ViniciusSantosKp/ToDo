<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function index () {
        $tasks = DB::select('SELECT * FROM tasks');
        return view('index', [ 'tasks'=>$tasks]);
    }

    public function add () {
        return view('add');
    }

    public function addAction (Request $request) {
        if($request->filled('description')){
            $description = $request->input('description');
            DB::insert('INSERT INTO tasks (description) VALUES (:description)', ['description' => $description]);

            return redirect()->route("home");
        }
        
        return redirect()->route("tasks.add")->with('warning', 'Preencha a descrição!');
        
        
    }

    public function edit ($id) {
        $data = DB::select('SELECT * FROM tasks WHERE id = :id', ['id'=>$id]);
        return view('edit', ['data'=> $data[0]]);
    }

    public function editAction (Request $request, $id) {
        if($request->filled('description')){
            $description = $request->input('description');
            DB::update('UPDATE tasks SET description = :description WHERE id=:id', [
                'id'=>$id,
                'description'=>$description
                ]) ;

            return redirect()->route("home");
        }else{
            return redirect()->route('tasks.edit', ['id'=>$id])->with('warning', 'Preencha a descrição!');
        }
    }

    public function delete ($id) {
        DB::delete('DELETE FROM tasks WHERE id=:id', ['id'=>$id]);

        return redirect()->route("home");
    }

    public function done ($id) {
        DB::update('UPDATE tasks SET done = 1 - done WHERE id=:id', [
            'id'=>$id,]) ;

        return redirect()->route("home");
    }
}
