<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$blogs = Blog::all();
        $blogs = Blog::latest()->get();

        //dd($blogs);
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
          'title' => ['required', 'min:5', 'max: 200'],
          'body' => ['required', 'min:20']
        ];
        // prvi parametar su podaci koje dobijamo POST metodom, u ovom slucaju title i body
        // drugi parametar govori da se na prvi parametar primena iskucana pravila
        $this->validate($request, $rules);

        // sve podatke koje smo dobili POST metodom stavi u promenljivu $input
        $input = $request->all();

        // idi u Blog bazu i u njoj kreiraj novi red
        $blog = Blog::create($input);

        // vraca na metodu zbog kljucne reci redirect
        return redirect('blogs');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        //dd($blog);
        //vrati edit view, blog u zagradi je $blog
        return view('blogs.edit', compact('blog'));
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
        // pravi input promenjivu i salje zahtev za sve podatke
        $input = $request->all();
        $blog = Blog::findOrFail($id);

        // input podatke kopira preko starih podataka
        $blog->update($input);

        // posle svega vraca na stranicu blogs index
        return redirect('blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // pronalazenje odredjenog zapisa uz pomoc id
        $blog = Blog::findOrFail($id);
        // brisanje
        $blog->delete();

        return redirect('blogs');
    }
}
