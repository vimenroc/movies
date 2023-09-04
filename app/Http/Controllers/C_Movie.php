<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\M_Movie;

class C_Movie extends Controller
{
    private $M_Movie;
    private $result = null;

    function __construct(){
        $this->M_Movie = new M_Movie;
    }

    public function index()
    {

        // ...
        $data = [
            'title' => 'Movie',
            'session' => session(),
        ];

        return view('movies.index')->with($data);
    }

    function FavoriteMovies($id = null){
        // ...
        $data = [
            'title' => 'Movie',
        ];

        return view('movies.favorites')->with($data);
    }

    function MovieDetails($id = null){
        // ...
        $data = [
            'title' => 'Movie',
            'userID' => Auth::id(),
            'movieID' => $id,
        ];

        return view('movies.details')->with($data);
    }

    function MovieSearch(){
        // ...
        $data = [
            'title' => 'Movie',
            'userID' => Auth::id(),
        ];

        return view('movies.search')->with($data);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    function JFavoriteCheck(Request $request){
        $data = [
            'userID' => Auth::id(),
            'movieID' => $request->input('moveidID'),
            'movieTitle' => $request->input('movieTitle'),
            'moviePosterURL' => $request->input('moviePosterURL'),
        ];
        if (is_null($request->input('favedFlag'))) {
            $this->result = $this->M_Movie->JFavoriteCheck($data);
        }else{
            $favedFlag = $request->input('favedFlag');
            if ($favedFlag == "true") {
                $this->result = $this->M_Movie->JFavoriteRemove($data);
            }else{
                $this->result = $this->M_Movie->JFavoriteAdd($data);
            }
        }
        return $this->result;
    }

    function JFavoriteMovies(Request $request){
        $data['userID'] = ($request->input('userID')) != null ? a : Auth::id() ;
        $result =  $this->M_Movie->JFavoriteMovies($data);
        return $result;
    }

    function JFavUnfav(Request $request){
        $data = [
            'userID' => Auth::id(),
            'movieID' => $request->input('moveidID')
        ];
        $result = $this->M_Movie->JFavoriteCheck($data);
        return $result;
    }
}
