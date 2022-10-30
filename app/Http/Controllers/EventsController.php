<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $events = Events::orderBy('id','desc')->get();
        return view('events.index', [
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
        ]);
        $filepath = '';
        if($request->file('image_file')){
            $file= $request->file('image_file');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images/events'), $filename);
            $filepath = '/events/'.$filename;
        }
        $event = Events::create([
            'title'=> $request->input('title'),
            'description'=> $request->input('description'),
            'venue'=> $request->input('venue'),
            'start_date'=> $request->input('start_date'),
            'end_date'=> $request->input('start_date'),
            'photo'=> $filepath,
        ]);
        if ($event){
           return redirect('/events/');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Events::where('id',$id)->firstOrFail();
        return view('events.view')->with(['event'=>$event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Events::where('id',$id)->firstOrFail();
        return view('events.update')->with(['event'=>$event]);
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
        $request->validate([
            'title' => 'required|string',
        ]);
        $filepath = null;
        if($request->file('image_file')){
            $file= $request->file('image_file');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images/events'), $filename);
            $filepath = '/events/'.$filename;
        }
        if ($filepath !== null){
            $event = Events::where('id',$id)->update([
                'title'=> $request->input('title'),
                'description'=> $request->input('description'),
                'venue'=> $request->input('venue'),
                'start_date'=> $request->input('start_date'),
                'end_date'=> $request->input('start_date'),
                'photo'=> $filepath,
            ]);
        }
        else{
            $event = Events::where('id',$id)->update([
                'title'=> $request->input('title'),
                'description'=> $request->input('description'),
                'venue'=> $request->input('venue'),
                'start_date'=> $request->input('start_date'),
                'end_date'=> $request->input('start_date'),
            ]);
        }

        if ($event){
            return redirect('/events/');
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
        //
    }
}
