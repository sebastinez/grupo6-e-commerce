<?php

use Illuminate\Database\Seeder;
use Ixudra\Curl\Facades\Curl;

class MusicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genreIdClassic = DB::table("genres")->insertGetId(["name" => "Classic"]);
        $genreIdEDM = DB::table("genres")->insertGetId(["name" => "EDM"]);
        $genreIdFunk = DB::table("genres")->insertGetId(["name" => "Funk"]);
        $genreIdHipHop = DB::table("genres")->insertGetId(["name" => "Hip-Hop"]);
        $genreIdJazz = DB::table("genres")->insertGetId(["name" => "Jazz"]);
        $genreIdLatin = DB::table("genres")->insertGetId(["name" => "Latin"]);
        $genreIdPop = DB::table("genres")->insertGetId(["name" => "Pop"]);

        $tokenRaw = Curl::to("https://accounts.spotify.com/api/token")->withHeader("Authorization: Basic YzliODg4ZDBlZjlmNDc2N2FmODFmMzAzZjFmZmMxOWI6MWU3MWM0NzViNTExNDgwNGI0NjIxMTJkMzMwOTZhMGM=")->withData(array("grant_type" => "client_credentials"))->post();

        $token = json_decode($tokenRaw, true);

        $allMusic = [

            /* [
                "genre" => $genreIdClassic,
                "artists" => [
                    "5aIqB5nVVvmFsvSdExz408", //Johann Sebastian Bach
                    "0Y8KmFkKOgJybpVobn1onU", //Luciano Pavarotti
                    "1JOQXgYdQV2yfrhewqx96o", //Giuseppe Verdi
                    "0OzxPXyowUEQ532c9AmHUR", //Giacomo Puccini
                    "3EA9hVIzKfFiQI0Kikz2wo", //Andrea Bocelli
                    "3hJv5p2HwekJysNB2NDnEC", //André Rieu
                    "1qAuetfG6mhtDgsVIffWQc",  //Susan Boyle 
                ]
            ],
            [
                "genre" => $genreIdEDM,
                "artists" => [
                    "0dmPX6ovclgOy8WWJaFEUU", //Kraftwerk
                    "4k1ELeJKT1ISyDv8JivPpB", //The Prodigy
                    "4tZwfgrHOc3mvqYlEYSvVi", //Daft Punk
                    "3OsRAKCvk37zwYcnzRf5XF", //Moby
                    "17dbJyUCrxh4I7iyUrjaHU", //Carl Craig
                    "1GhPHrq36VKCY3ucVaZCfo", //The Chemical Brothers
                    "4Y7tXHSEejGu1vQ9bwDdXW", //Fatboy Slim
                    "6FXMGgJwohJLUSr5nVlf9X", //Massive Attack
                    "2CIMQHirSU0MQqyYHq0eOx", //deadmau5 
                ]
            ],
            [
                "genre" => $genreIdFunk,
                "artists" => [
                    "3DFoVPonoAAt4EZ1FEI8ue", //Sly & The Family Stone
                    "53QzNeFpzAaXYnrDBbDrIp", //The Isley Brothers
                    "2ZvrvbQNrHKwjT7qfGFFUW", //Herbie Hancock
                    "7GaxyUddsPok8BuhxN6OUW", //James Brown
                    "6twIAGnYuIT1pncMAsXnEm", //Commodores
                    "5Ryxgm3uLvQOsw4H5ZpHDn", //Betty Davis
                    "5SMVzTJyKFJ7TUb46DglcH", //Parliament
                    "4QQgXkCYTt3BlENzhyNETg", //Earth, Wind & Fire
                    "3MHaV05u0io8fQbZ2XPtlC", //Prince 
                ]
            ],
            [
                "genre" => $genreIdHipHop,
                "artists" => [
                    "0Mz5XE0kb1GBnbLQm2VbcO", //Mos Def
                    "5me0Irg2ANcsgc93uaYrpb", //The Notorious B.I.G.
                    "09hVIj6vWgoCDtT03h8ZCa", //A tribe called quest
                    "34EP7KEpOjXcM2TCat1ISk", //Wu-Tang Clan
                    "3q7HBObVc0L8jNeTe5Gofh", //50 Cent
                    "7dGJo4pcD2V6oG8kP0tJRR", //Eminem
                    "6DPYiyq5kWVQS4RGwxzPC7", //Dr. Dre
                    "7hJcb9fa4alzcOq3EaNPoG", //Snoop Dogg
                    "1ZwdS5xdxEREPySFridCfh", //2 Pac
                    "4EnEZVjo3w1cwcQYePccay", //N.W.A. 
                ]
            ],
            [
                "genre" => $genreIdJazz,
                "artists" => [
                    "2hGh5VOeeqimQFxqXvfCUf", //John Coltrane
                    "0kbYTNQb4Pb1rPbbaF0pT4", //Miles Davis
                    "5olDKSsFhhmwh8UCWwKtpq", //Chick Corea
                    "3rxeQlsv0Sc2nyYaZ5W71T", //Chet Baker
                    "6rxxu32JCGDpKKMPHxnSJp", //Eric Dolphy
                    "3UXq4fckDmcPmleixlrl6i", //Anthony Braxton
                    "0ZqhrTXYPA9DZR527ZnFdO", //Wayne Shorter
                    "4PDpGtF16XpqvXxsrFwQnN", //Thelonious Monk
                    "47odibUtrN3lnWx0p0pk2P", //Ornette Coleman 
                ]
            ], */
            [
                "genre" => $genreIdLatin,
                "artists" => [
                    "3jO7X5KupvwmWTHGtHgcgo", //Charly Garcia
                    "1bZNv4q3OxYq7mmnLha7Tu", //Fito Paez
                    /*   "3tAICgiSR5PfYY4B8qsoAU", //Andrés Calamaro
                    "6ZIgPKHzpcswB8zh7sRIhx", //Divididos
                    "3rSpnCzb6wtsvZlGkkcHz4", //Sumo
                    "7An4yvF7hDYDolN4m5zKBp", //Soda Stereo
                    "7FnZWGw9lwOr7WzieTKEPR", //Los Pericos
                    "1MuQ2m2tg7naeRGAOxYZer", //Luis Alberto Spinetta
                    "2F9pvj94b52wGKs0OqiNi2", //Babasónicos
                    "2Rc3Tb5XUPF1YlnQwuPgjg", //Illya Kuryaki & The Valderramas  */
                ]
            ],
            [
                "genre" => $genreIdPop,
                "artists" => [
                    "6tbjWDEIzxoDsBA1FuhfPW", //Madonna
                    "3fMbdgg4jU18AjLCKBhRSm", //Michael Jackson
                    /*  "3yY2gUcIsjMr8hjo51PoJ8", //The Smiths
                    "0du5cEVh5yTK9QJze8zA0C", //Bruno Mars
                    "6ogn9necmbUdCppmNnGOdi", //Alanis Morissette
                    "0uq5PttqEjj3IH1bzwcrXF", //Spice Girls
                    "2SHhfs4BiDxGQ3oxqf0UHY", //Roxette
                    "31TPClRtHm23RisEBtV3X7", //Justin Timberlake
                    "4dpARuHxo51G3z768sgnrY", //Adele
                    "3oDbviiivRWhXwIE8hxkVV", //The Beach Boys */
                ]
            ]
        ];
        foreach ($allMusic as $genre) {
            $artistas = implode(",", $genre["artists"]);
            $data = Curl::to("https://api.spotify.com/v1/artists")->withHeader('Authorization: Bearer ' . $token["access_token"])->withData(array("ids" => $artistas))->get();
            $data = json_decode($data, true);
            foreach ($data["artists"] as $artist) {
                $artist_id = DB::table("artists")->insertGetId([
                    "spotify_id" => $artist["id"],
                    "name" => $artist["name"]
                ]);

                //Obtención y guardado de discos por artista
                $albums = Curl::to("https://api.spotify.com/v1/artists/" . $artist["id"] . "/albums")->withHeader('Authorization: Bearer ' . $token["access_token"])->get();
                $albums = json_decode($albums, true);
                foreach ($albums["items"] as $album) {
                    $label = array_key_exists("label", $album) ? $album["label"] : "";
                    $release_date = strlen($album["release_date"]) < 10 ? substr($album["release_date"], 0, 4) . "-01-01" : $album["release_date"];

                    $album_id = DB::table("albums")->insertGetId([
                        "spotify_id" => $album["id"],
                        "name" => $album["name"],
                        "genres_id" => $genre["genre"],
                        "release_date" => $release_date,
                        "label" => $label,
                        "cover" => $album["images"][0]["url"],
                        "total_tracks" => $album["total_tracks"]
                    ]);

                    DB::table("artists_albums")->insert([
                        "artists_id" => $artist_id,
                        "albums_id" => $album_id
                    ]);

                    //Obtención de canciones de cada disco
                    $tracks = Curl::to("https://api.spotify.com/v1/albums/" . $album["id"] . "/tracks")->withHeader('Authorization: Bearer ' . $token["access_token"])->get();

                    $tracks = json_decode($tracks, true);

                    foreach ($tracks["items"] as $track) {
                        $track_id = DB::table("tracks")->insertGetId([
                            "spotify_id" => $track["id"],
                            "album_id" => $album_id,
                            "name" => $track["name"],
                            "preview_url" => $track["preview_url"],
                            "track_number" => $track["track_number"],
                            "duration" => $track["duration_ms"]
                        ]);
                    }
                }
            }
        }
    }
}
