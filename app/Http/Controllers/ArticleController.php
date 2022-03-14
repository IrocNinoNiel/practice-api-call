<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\ArticleService;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        try{
            $articles = Article::all();
            // $articles1 = ArticleService()->getAllArticle();
        } catch(\Exception $exception){
            return response()->json(['error'=>$exception->getMessage()], 422);
        }

        return response()->json($articles);
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

        try{
            $article = new Article;

            $article->title = $request->title;
            $article->body = $request->body;

            $article->save();
        } catch(\Exception $exception){
            return response()->json(['error'=>$exception->getMessage()], 422);
        }

        return response()->json('Article Added');
      
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
        $article = Article::find($id);
        return response()->json($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $article = Article::findOrFail($id);


        $article->title = $request->title;
        $article->body = $request->body;

        $article->save();

        return response()->json($article,200);
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
        Article::find($id)->delete();
    
        return response()->json('Article Deleted');
    }
}
