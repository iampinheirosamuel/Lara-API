<?php

namespace App\Http\Controllers;

use App\Task;

class TaskController extends Controller
{
	//Display basic view
	public function general(){

		return view('about');

	}
	
    //Display all items in DB to the view
    public function index(){

    	$tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

     //Display selected item in DB to the view
    public function show($id){

    	$task = Task::find($id);

        return view('tasks.show', compact('task'));
    }
}
