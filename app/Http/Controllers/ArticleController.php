<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();

        return new JsonResponse($articles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $title = $request->input('title');
        $url = $request->input('url');

        $article = new Article;
        $article->title = $title;
        $article->url = $url;
        $article->save();

        return new JsonResponse($article);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $article = Article::find($id);

        return new JsonResponse($article);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $article = Article::find($id);

        return new JsonResponse($article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, $id)
    {
        $title = $request->input('title');
        $url = $request->input('url');

        $article = Article::find($id);
        $article->title = $title;
        $article->url = $url;
        $article->save();

        return new JsonResponse($article);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return "Article (id: $id) deleted successfully.";
    }
}