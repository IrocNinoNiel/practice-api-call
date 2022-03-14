<?php

namespace App\Http\Services;


use App\Models\Article;


class ArticleService
{
    public function getAllArticle(){
        $articles = Article::all();
        return $articles;
    }
}
