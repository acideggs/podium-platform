<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Response;

class ResponseController extends Controller
{
    /*
     * Proteksi fungsi
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $responses = Response::where('user_id', $id)->get();

        return view('response.list', ['responses' => $responses]);
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
            'response'     => 'required',
        ]);

        // dd($request->all());

        Response::create($request->all());

        return redirect()->route('article.show', ['article' => $request->article_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = Response::find($id)->first();
        return view('response.edit', ['response' => $response]);
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
        $response = Response::find($id);
        $response->response = $request->response;
        $response->save();

        return redirect()->route('response.list', ['id' => Auth::id()])->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Response::destroy($id);

        return redirect()->route('response.list', ['id' => Auth::id()])->with('success', 'Data berhasil dihapus');
    }
}
