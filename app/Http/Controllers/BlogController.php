<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Photo;
use Carbon\Carbon;

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
          'body' => ['required', 'min:20'],
          // mimes - dozvoljeni formati
          'photo_id' => ['mimes:jpeg, jpg, png', 'max:10000']
        ];
        $message = [
          'photo_id.mimes' => 'Ekstenzija mora biti jpg, jpeg ili png!',
          'photo_id.max' => 'Vasa fotografija mora biti manja od 1MB'
        ];
        // prvi parametar su podaci koje dobijamo POST metodom, u ovom slucaju title i body
        // drugi parametar govori da se na prvi parametar primena iskucana pravila
        $this->validate($request, $rules, $message);

        // sve podatke koje smo dobili POST metodom stavi u promenljivu $input
        $input = $request->all();

        $input['slug'] = str_slug($request->title);

        if ($file = $request->file('photo_id')) {
          // ime ce dobiti vrednost vremena
          $name = Carbon::now(). '.' .$file->getClientOriginalName();
          $file->move('pictures', $name);
          $photo = Photo::create(['photo' => $name, 'title' => $name]);
          $input['photo_id'] = $photo->id;
        }

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
        // $blog = Blog::findOrFail($id);
        // return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id)->first();
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
