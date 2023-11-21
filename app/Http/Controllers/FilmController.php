<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilmRequest;
use App\Http\Requests\UpdateFilmRequest;
use App\Models\Film;
use Illuminate\Support\Facades\Auth;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $filmsLatest = $this->verRecientes();
        $filmsLiked = $this->verRecientes();

        return view('index')->with('films',Film::all())
            ->with('filmsLatest',$filmsLatest)
            ->with('filmsLiked',$filmsLiked);

    }

    public function index()
    {
        $filmsLatest = $this->verRecientes();
        $filmsLiked = $this->verPopulares();
        return view('films.index')->with('films',Film::all())
        ->with('filmsLatest',$filmsLatest)
        ->with('filmsLiked',$filmsLiked);

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
    public function store(StoreFilmRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
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

        $filmsLiked = Film::withCount('users_liked')->orderBy('users_liked_count', 'desc')->take(4)->get();

        return $filmsLiked;
    }

}
