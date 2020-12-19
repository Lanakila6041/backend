<?php
namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\User;

class ArticleController extends Controller
{
    public function index()
    {
        return Article::all();
    }
    public function getAllUser()
    {
        return User::all();
    } 
    public function show($id)
    {
        return Article::find($id);
    }

    public function store(Request $request)
    {
        return Article::create($request->all());
    }
    public function storeGoy(Request $request)
    {
        $article = new Article();
        $article->title = $request->input('title');
        $article->year = $request->input('year');
        $article->body = $request->input('body');
        $article->save();
        return $article;
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        // return $article;
        $article->update($request->all());

        return $article;
    }

    
    public function updateManai(Request $request)
    {
        $article = Article::findOrFail($request->input('id'));
        $article->title = $request->input('title');
        $article->save();
        return $article;
    }
    
    public function haigaadZasdagFunc(Request $request)
    {
        $articles = Article::where('title', $request->input('title'))->get();
        foreach($articles as $item){
            $item->body = 'delhii';
            $item->save();
        }
        return $articles;
    }

    public function delete(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return 204;
    }
}
