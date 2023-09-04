<?php

namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Movie extends Model
{
    use HasFactory;



    function JFavoriteMovies($data){
        $result = DB::table("r_movie_user")
            ->where('ID_USER', $data['userID'])
            ->get();

        return json_encode($result);
    }

    function JFavoriteCheck($data){
        // $result = DB::select("select * from r_movie_user where ID_USER = $data[userID] and ID_MOVIE = '$data[movieID]'");
        $result = DB::table("r_movie_user")
            ->where('ID_USER', $data['userID'])
            ->where('ID_MOVIE', $data['movieID'])
            ->first();
        return json_encode($result);
    }

    function JFavoriteAdd($data){
        $result = DB::table("r_movie_user")
            ->insert([
                'ID_USER' => $data['userID'],
                'ID_MOVIE' => $data['movieID'],
                'MOVIE_TITLE' => $data['movieTitle'],
                'POSTER_URL' => $data['moviePosterURL'],
            ]);
        return json_encode($result);
    }

    function JFavoriteRemove($data){
        $result = DB::table("r_movie_user")
            ->where('ID_USER', $data['userID'])
            ->where('ID_MOVIE', $data['movieID'])
            ->delete();
        return json_encode($result);
    }

}
