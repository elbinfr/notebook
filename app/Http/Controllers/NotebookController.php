<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use File;
use Image;
use Storage;
use Illuminate\Validation\Rule;
use App\Note;
use App\Notebook;
use App\User;

class NotebookController extends Controller
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
        session()->forget('notebook');
        
        $notebooks = auth()->user()->notebooks;// Notebook::where('user_id', $user_id)->orderBy('title')->get();
        
        return view('notebook.index', compact('notebooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notebook = new Notebook();
        return view('notebook.create', compact('notebook'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $this->validate($request, [
            'title' => [
                'required',
                'min:3',
                Rule::unique('notebooks')->where(function ($query){
                    $query->where('user_id', auth()->user()->id);
                })
            ],
            'description' => 'required|min:3',
            'image' => 'image|mimes:jpeg,png,jpg|max:5120'
        ]);

        $notebook = Notebook::create([
            'user_id' => $user->id,
            'title' => trim($request->input('title')),
            'description' => trim($request->input('description')),
            'slug' => str_slug(trim($request->input('title')), '-')
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();

            $url = storage_path('app/public/notebooks/'.$image_name);
            Image::make($image)->resize(400,400)->save($url);

            $notebook->image = $image_name;
            $notebook->save();
        }

        return redirect('notebooks');
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
        $notebook = Notebook::find($id);

        return view('notebook.edit', compact('notebook'));
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

        $notebook = Notebook::find($id);

        $this->validate($request, [
            'title' => [
                'required',
                'min:3',
                Rule::unique('notebooks')->ignore($notebook->id)->where(function ($query){
                    $query->where('user_id', auth()->user()->id);
                })
            ],
            'description' => 'required|min:3',
            'image' => 'image|mimes:jpeg,png,jpg|max:5120'
        ]);

        $notebook->title = trim($request->title);
        $notebook->description = trim($request->description);
        $notebook->slug = str_slug(trim($request->title), '-');

        
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            
            $url = storage_path('app/public/notebooks/'.$image_name);
            $img = Image::make($image)->resize(400,400)->save($url);
            $notebook->image = $image_name;
        }

        $notebook->save();

        return redirect('notebooks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Notebook::destroy($id);
        return redirect('/notebooks');
    }

    public function open($slug)
    {
        $user_id = auth()->user()->id;
        $notebook = Notebook::where('user_id', $user_id)->where('slug', $slug)->firstOrFail();
        session()->put('notebook', $notebook);

        $notes = Note::where('notebook_id', $notebook->id)->orderBy('created_at', 'desc')->get();

        return view('note.index', compact('notes'));
    }
}
