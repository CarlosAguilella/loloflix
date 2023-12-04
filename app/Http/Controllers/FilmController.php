<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilmRequest;
use App\Http\Requests\UpdateFilmRequest;
use App\Http\Requests\SearchFilmRequest;

use App\Models\Film;
use App\Models\Genero;
use Illuminate\Support\Facades\Auth;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        return view('index')->with('films',Film::all())
            ->with('filmsLatest', $this->verRecientes())
            ->with('filmsLiked', $this->verPopulares());

    }

    public function index()
    {
        return view('films.index')->with('films',Film::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('films.create')->with('generos', Genero::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFilmRequest $request)
    {
        // Libro::create($request->all());


        $libro = new Film($request->all());

        // dd($request->file('videofile'));

        if ($request->file('videofile')){
            $libro->video = $request->file('videofile')->storePublicly('video','public');
        }

        $libro->save();

        $libro->generos()->attach($request->generos);

        return to_route("films.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        if (Auth::user()->monedero < $film->ticket_price) {
            return redirect()->route('profile.monedero', ['referrer' => route('films.show', $film)]);
        }

        Auth::user()->monedero = Auth::user()->monedero - $film->ticket_price;
        Auth::user()->save();

        return view('films.show', [
            'film' => $film
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFilmRequest $request, Film $film)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        //
    }

    public function ponerlikes($filmid)
    {
        //$film->liked->attach(auth()->user()->id);
        if (Auth::user()->films_liked->contains($filmid)) {
            Auth::user()->films_liked()->detach($filmid);
        } else {
            Auth::user()->films_liked()->attach($filmid);
        }

        return back();
    }

    public function verlikes()
    {
        return view('films.likes', [
            'films' => Auth::user()->films_liked
        ]);
    }

    public function verRecientes() {
        return Film::orderBy('created_at', 'desc')->take(4)->get();
    }

    public function verPopulares() {
        return Film::withCount('users_liked')->orderBy('users_liked_count', 'desc')->take(4)->get();
    }

    public function search(SearchFilmRequest $request)
    {
        $name = $request->search;

        $films = Film::where('title', 'like', "%$name%")->get();
        return view('films.index', compact('films'));
    }

}
