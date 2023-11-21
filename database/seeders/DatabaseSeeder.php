<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Film;
use App\Models\Genero;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $drama = Genero::create(["name" => "Drama"]);
        $terror = Genero::create(["name" => "Terror"]);
        $romantico = Genero::create(["name" => "Romantico"]);
        $anime = Genero::create(["name" => "Anime"]);
        $historico = Genero::create(["name" => "Historico"]);
        $comedia = Genero::create(["name" => "Comedia"]);
        $accion = Genero::create(["name" => "Accion"]);
        $misterio = Genero::create(["name" => "Misterio"]);
        $porno = Genero::create(["name" => "Porno"]);

        $batman6 = Film::create(["title" => "Batman 6", "description" => "Ja jdasf jsdafj dsfjdsaf fd", "release_year" => "2002", "rating" => 0, "ticket_price" => 10, "photo" => "/photo.jpg", "video" => "/video/video.mp4"]);
        $superman6 = Film::create(["title" => "Superman 6", "description" => "Ja jdasf jsdafj dsfjdsaf fd", "release_year" => "2003", "rating" => 0, "ticket_price" => 20, "photo" => "/photo.jpg", "video" => "/video/video.mp4"]);
        $spiderman67 = Film::create(["title" => "Spiderman 67", "description" => "Ja jdasf jsdafj dsfjdsaf fd", "release_year" => "2001", "rating" => 0, "ticket_price" => 30, "photo" => "/photo.jpg", "video" => "/video/video.mp4"]);
        $batman1 = Film::create(["title" => "Batman 1", "description" => "Ja jdasf jsdafj dsfjdsaf fd", "release_year" => "2005", "rating" => 0, "ticket_price" => 10, "photo" => "/photo.jpg", "video" => "/video/video.mp4"]);
        $batman2 = Film::create(["title" => "Batman 2", "description" => "Ja jdasf jsdafj dsfjdsaf fd", "release_year" => "2002", "rating" => 0, "ticket_price" => 20, "photo" => "/photo.jpg", "video" => "/video/video.mp4"]);
        $batman3 = Film::create(["title" => "Batman 3", "description" => "Ja jdasf jsdafj dsfjdsaf fd", "release_year" => "2002", "rating" => 0, "ticket_price" => 30, "photo" => "/photo.jpg", "video" => "/video/video.mp4"]);
        $batman4 = Film::create(["title" => "Batman 4", "description" => "Ja jdasf jsdafj dsfjdsaf fd", "release_year" => "2002", "rating" => 0, "ticket_price" => 0, "photo" => "/photo.jpg", "video" => "/video/video.mp4"]);



        $batman6->generos()->save($drama);
        $batman6->generos()->save($terror);

        $superman6->generos()->save($drama);
        $superman6->generos()->save($historico);


        $spiderman67->generos()->save($porno);






        Film::factory(100)->create();

        User::factory(10)->create();

        $userChaba = User::create([
            "email" => "b@b",
            "name" => "Hector",
            'password' => bcrypt('b'),
            'monedero' => '100',
        ]);


        $userAdmin = User::create([
            "email" => "a@a",
            "name" => "Admin",
            'password' => bcrypt('a'),
            'monedero' => '100',
        ]);



        $userAdmin->films_liked()->save($batman1);
        $userAdmin->films_liked()->save($batman2);
        $userChaba->films_liked()->save($batman1);
        $userChaba->films_liked()->save($batman2);
        $userChaba->films_liked()->save($superman6);
    }

}
