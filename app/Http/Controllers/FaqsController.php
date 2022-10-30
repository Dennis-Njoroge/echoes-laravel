<?php

namespace App\Http\Controllers;

use App\Models\Faqs;
use Illuminate\Http\Request;

class FaqsController extends Controller
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
        $faqs = Faqs::orderBy('id','desc')->get();
        return view('faqs.index', [
            'faqs' => $faqs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faq = new Faqs();
        return view('faqs.create',[
            'faq'=> $faq
        ]);
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
            'question' => 'required|string',
            'answer'=>'required|string',
        ]);
       $faq = Faqs::create([
           'title' => $request->input('title'),
           'question'=>$request->input('question'),
           'answer'=>$request->input('answer'),
       ]);
       if ($faq){
           return redirect('/help/');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faq = Faqs::where('id',$id)->firstOrFail();
        return view('faqs.view')->with(['faq'=>$faq]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Faqs::where('id',$id)->firstOrFail();
        return view('faqs.update')->with(['faq'=>$faq]);
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
            'question' => 'required|string',
            'answer'=>'required|string',
        ]);
        $faq = Faqs::where('id',$id)->update([
            'title' => $request->input('title'),
            'question'=>$request->input('question'),
            'answer'=>$request->input('answer'),
        ]);
        if ($faq){
            return redirect('/help/');
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
