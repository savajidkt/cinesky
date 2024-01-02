<?php

namespace App\Http\Controllers\Admin\Movie;

use App\Http\Controllers\Controller;
use App\Http\Requests\Movie\CreateRequest;
use App\Http\Requests\Movie\EditRequest;
use App\Models\Movie;
use App\Models\Language;
use App\Models\Genre;
use App\Models\Director;
use App\Models\Homecategory;
use App\Repositories\MovieRepository;
use App\Repositories\LanguageRepository;
use App\Repositories\GenreRepository;
use App\Repositories\DirectorRepository;
use App\Repositories\HomecategoryRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class MoviesController extends Controller
{
    /** \App\Repository\MovieRepository $movieRepository */
    protected $movieRepository;
    protected $languageRepository;
    protected $genreRepository;
    protected $directorRepository;
    protected $homecategoryRepository;

    public function __construct(MovieRepository $movieRepository , LanguageRepository $languageRepository , GenreRepository $genreRepository, DirectorRepository $directorRepository, HomecategoryRepository $homecategoryRepository)
    {
        $this->movieRepository          = $movieRepository;
        $this->languageRepository       = $languageRepository;
        $this->genreRepository       = $genreRepository;
        $this->directorRepository       = $directorRepository;
        $this->homecategoryRepository       = $homecategoryRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Movie::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('movie_title', function (Movie $movie) {
                    return $movie->movie_title;
                })
                ->editColumn('genre_id', function (Movie $movie) {
                    return $movie->genres->genre_name;
                })
                ->filterColumn('genre_id', function ($query, $keyword) {
                    $query->whereHas('genres', function ($query) use ($keyword) {
                        $query->where('genre_name', 'LIKE', '%' . $keyword . '%');
                    });
                })
                ->editColumn('director_id', function (Movie $movie) {
                    return $movie->directors->name;
                })
                ->filterColumn('director_id', function ($query, $keyword) {
                    $query->whereHas('directors', function ($query) use ($keyword) {
                        $query->where('name', 'LIKE', '%' . $keyword . '%');
                    });
                })
                ->editColumn('poster_image', function (Movie $movie) {
                    return $movie->imageposter_path;
                })
                ->editColumn('total_views', function (Movie $movie) {
                    return $movie->total_views;
                })
                ->editColumn('status', function (Movie $movie) {
                    return $movie->status_name;
                })
                ->addColumn('action', function ($row) {
                    return $row->action;
                })->rawColumns(['action', 'status', 'poster_image', 'cover_image'])->make(true);
        }

        return view('admin.movie.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        //
        $rawData    = new Movie;
        $languages  = $this->languageRepository->getLanguage();
        $genres  = $this->genreRepository->getGenre();
        $directors  = $this->directorRepository->getDirector();
        $homecategorys  = $this->homecategoryRepository->getHomecategory();
        return view('admin.movie.create', ['model' => $rawData,'languages' => $languages,'genres' => $genres,'directors' => $directors,'homecategorys' => $homecategorys]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        //dd($request->all());
        $this->movieRepository->create($request->all());
        return redirect()->route('movies.index')->with('success', "Movie created successfully!");
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
     * Method edit
     *
     * @param Movie $movie [explicite description]
     *
     * @return void
     */
    public function edit(Movie $movie)
    {
        $languages  = $this->languageRepository->getLanguage();
        $genres  = $this->genreRepository->getGenre();
        $directors  = $this->directorRepository->getDirector();
        $homecategorys  = $this->homecategoryRepository->getHomecategory();
        return view('admin.movie.edit', ['model' => $movie, 'languages' => $languages,'genres' => $genres,'directors' => $directors,'homecategorys' => $homecategorys]);
    }


    public function update(EditRequest $request, Movie $movie)
    {
        $this->movieRepository->update($request->all(), $movie);

        return redirect()->route('movies.index')->with('success', "Movie updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $this->movieRepository->delete($movie);

        return redirect()->route('movies.index')->with('success', "Movie deleted successfully!");
    }


    /**
     * Method changeStatus
     *
     * @param Request $request [explicite description]
     *
     * @return JsonResponse
     */
    public function changeStatus(Request $request): JsonResponse
    {
        $input = $request->all();
        $movie  = Movie::find($input['user_id']);
        // dd($user);
        if ($this->movieRepository->changeStatus($input, $movie)) {
            return response()->json([
                'status' => true,
                'message' => 'movie status updated successfully.'
            ]);
        }

        throw new Exception('movie status does not change. Please check sometime later.');
    }




}