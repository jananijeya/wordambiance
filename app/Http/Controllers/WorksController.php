<?php

namespace App\Http\Controllers;
use App\Work;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Session;

class WorksController extends Controller
{
    //fetch all works data
    public function index(){
        return view('works.index');
    }

    public function details($id){
        //fetch works data
        $work = Work::find($id);

        //pass works data to view and load list view
        return view('works.details', ['work' => $work]);
    }

    public function add(){

        //fetch work data
        return view('works.add');

    }

    public function insert(Request $request){
        //validate work data
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'content' => 'required'
        ]);

        //get work data
        $workData = $request->all();

        //insert work data
        Work::create($workData);

        return redirect()->route('works.writing');
    }

    public function edit($id){
        //get work data by id
        $work = Work::find($id);

        //load form view
        return view('works.edit', ['work' => $work]); //Associative array where the key is work and the value is the $work array
    }

    public function update($id, Request $request){
        //validate work data
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'content' => 'required'
        ]);

        //get work data
        $workData = $request->all();

        //update work data
        Work::find($id)->update($workData);

        return redirect()->route('works.writing');
    }

    public function delete($id){
        //update work data
        Work::find($id)->delete();

        return redirect()->route('works.writing');
    }

    //CUSTOM METHODS

    public function writing(){
        $works = Work::orderBy('created', 'desc')->get();

        //pass works data to view and load list view
        return view('works.writing', ['works' =>$works]);
    }

    public function about(){
        return view('works.about');
    }



}
