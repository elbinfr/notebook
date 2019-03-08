<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Validation\Rule;

use App\Note;
use App\Notebook;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $note = new Note();

        return view('note.create', compact('note'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notebook = session()->get('notebook');

        $this->validate($request, [
           'title' => [
               'required',
               'min:3',
               Rule::unique('notes')->where(function($query){
                   $query->where('notebook_id', session()->get('notebook')->id);
               })
           ],
            'content' => 'required|min:3'
        ]);

        Note::create([
            'notebook_id' => $notebook->id,
            'title' => trim($request->input('title')),
            'content' => trim($request->input('content')),
            'slug' => str_slug(trim($request->input('title')))
        ]);

        return redirect('/notebooks/'.$notebook->slug.'/open');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notebook = session()->get('notebook');
        $note = Note::where('notebook_id', $notebook->id)->where('slug', $id)->firstOrFail();

        return view('note.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notebook = session()->get('notebook');
        $note = Note::where('notebook_id', $notebook->id)->where('slug', $id)->firstOrFail();

        return view('note.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $notebook = session()->get('notebook');
        $note = Note::where('notebook_id', $notebook->id)->where('id',$id)->firstOrFail();

        $this->validate($request, [
            'title' => [
                'required',
                'min:3',
                Rule::unique('notes')->ignore($note->id)->where(function($query){
                    $query->where('notebook_id', session()->get('notebook')->id);
                })
            ],
            'content' => 'required|min:3'
        ]);

        $note->title = trim($request->input('title'));
        $note->content = trim($request->input('content'));
        $note->slug = str_slug(trim($request->input('title')));

        $note->save();

        return redirect('/notebooks/'.$notebook->slug.'/open');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notebook = session()->get('notebook');
        $note = Note::where('notebook_id', $notebook->id)->where('id',$id)->firstOrFail();

        Note::destroy($id);
        return redirect('/notebooks/'.$notebook->slug.'/open');
    }
}
