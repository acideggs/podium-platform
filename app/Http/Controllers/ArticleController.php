<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;

class ArticleController extends Controller
{

    /*
     * Proteksi fungsi selain index
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'indexByTag']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all();

        return view('dashboard', ['articles' => $article]);
    }

    /*
     *   Menampilkan Data Artikel Berdasarkan User
     */

    public function indexByUser($id)
    {
        $articles = Article::where('user_id', $id)->get();

        return view('article.list', ['articles' => $articles]);
    }

    /*
     *   Menampilkan Data Artikel Berdasarkan Tag
     */
    public function indexByTag($tagId)
    {
        $tag = Tag::with('articles')->where('id', $tagId)->first();

        // dd($tag);
        return view('tag.list', ['tag' => $tag]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        return view('article.create');
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
            'title'     => 'required',
            'content'   => 'required',
            'tag'       => 'required'
        ]);

        $newArticle = Article::create($request->all());

        $tags = explode(",", trim(strtolower($request->tag)));

        $tagData = [];

        foreach ($tags as $value) {

            $tag["name"] = trim($value);
            $tagData[] = $tag;

        }

        foreach ($tagData as $value) {

            $tag = Tag::firstOrCreate($value);
            $newArticle->tags()->attach($tag->id);

        }

        return redirect()->route('article.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);

        return view('article.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

        $tag = [];

        foreach ($article->tags as $key => $value) {

            $tag[] = $value->name;

        }

        $tags = implode(",", $tag);

        return view('article.edit', ['article' => $article, 'tags' => $tags]);
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
        $article = Article::find($id);

        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();

        $article->tags()->detach($article->tag);


        $tags = explode(",", $request->tag);

        $tagData = [];

        foreach ($tags as $value) {

            $tag["name"] = $value;
            $tagData[] = $tag;

        }

        foreach ($tagData as $value) {

            $tag = Tag::firstOrCreate($value);
            $article->tags()->attach($tag->id);

        }

        return redirect()->route('article.list', ['id' => $article->user_id])->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        Article::destroy($id);

        return redirect()->route('article.list', ['id' => $article->user_id])->with('success', 'Data berhasil dihapus');
    }
}
