<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class ArticlesController extends Controller
{
    public function index()
    {
        
        return view('articles.index');
    }

    public function authent()
    {
        $articles = Article::all();
        foreach ($articles as $elem) {
            $lien_convivial = Str::slug($elem->titre . '-' . $elem->resume, '-');
            // on ajoute 'url' comme un nouveau collone dans le resultats de la base de données
            $elem->url = $lien_convivial;
        }
        return view('articles.blog-post', compact('articles'));
    }

    public function blog_post()
    {
        $articles = Article::all();
        foreach ($articles as $elem) {
            $lien_convivial = Str::slug($elem->titre . '-' . $elem->resume, '-');
            
            // decodage de l'image encoder en base64
            $imageData->image = base64_decode($elem->imageencode);
            
            // creation de l'emplacement de l'image avec son nom et extension
            $filePath = public_path('image-project/upload-backoffice/' . $elem->image);
            
            // creation de l'image et l'emplacer dans le path public
            file_put_contents($filePath, $imageData);
            
            // on ajoute 'url' comme un nouveau collone dans le resultats de la base de données
            $elem->url = $lien_convivial;
        }
        return view('articles.blog-post', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $article = new Article;

        $article->titre = $request->titre;
        $article->resume = $request->resume;
        $article->contenu = $request->contenu;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $base64 = base64_encode($image);
            //$imageName = time() . '-' . $image->getClientOriginalName();
            $article->image =  $base64;
            //$image->store('image-project/updload-backoffice', $imageName);
        } else {
            echo 'tay';
        }

        $article->save();

        return redirect()->route('blog-post');
    }

    public function show($categorie, $article)
    {
        $article = Article::find($article);
        $contenu = $article->contenu;
        $contenu_decode  = html_entity_decode($contenu);
        $data = [
            'article' => $article,
            'contenu' => $contenu_decode
        ];
        return view('articles.blog-single', $data);
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $article->titre = $request->titre;
        $article->contenu = $request->contenu;
        $article->resume = $request->resume;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $article->image = $imageName;
            $image->move(public_path('image-project/updload-backoffice'), $imageName);
        } else {
        }


        $article->save();

        return redirect()->route('blog-post');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        $articles = Article::all();
        foreach ($articles as $elem) {
            $lien_convivial = Str::slug($elem->titre . '-' . $elem->resume, '-');
            // on ajoute 'url' comme un nouveau collone dans le resultats de la base de données
            $elem->url = $lien_convivial;
        }
        return view('articles.blog-post', compact('articles'));        
    }
}
