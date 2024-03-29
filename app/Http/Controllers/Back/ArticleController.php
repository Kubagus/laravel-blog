<?php

namespace App\Http\Controllers\Back;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.article.index', [
            'articles' => Article::with('Category')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.article.create',[
            'categories' => Category::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->validated();
        $file = $request->file('img');
        $fileName = uniqId() . '.'. $file->getClientOriginalExtension();
        $file->storeAs('public/back/' . $fileName);

        $data['img'] = $fileName;
        $data['slug'] = Str::slug($data['title']);


        Article::create($data);

        return redirect('/article')->with('success', 'Artikel berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('back.article.show', [
            'article' => Article::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         return view('back.article.update',[
            'article' => Article::find($id),
            'categories' => Category::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = uniqId() . '.'. $file->getClientOriginalExtension();
            $file->storeAs('public/back/' . $fileName);

            // delete old image
            Storage::delete(['public/back/' . $request->oldImg]);
            $data['img'] = $fileName; 
        } else {
            $data['img'] = $request->oldImg;
        }
        
        $data['slug'] = Str::slug($data['title']);
        Article::find($id)->update($data);
        return redirect('/article')->with('success', 'Artikel berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Article::find($id);
        Storage::delete(['public/back/' . $data->img]);
        $data->delete();
        return back()->with('success', 'Artikel telah dihapus');


    }
}
