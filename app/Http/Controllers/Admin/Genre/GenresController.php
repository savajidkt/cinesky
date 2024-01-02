<?php

namespace App\Http\Controllers\Admin\Genre;

use App\Http\Controllers\Controller;
use App\Http\Requests\Genre\CreateRequest;
use App\Http\Requests\Genre\EditRequest;
use App\Http\Requests\Banner\PDFRequest;
use App\Models\Genre;

use App\Repositories\GenreRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class GenresController extends Controller
{
    /** \App\Repository\GenreRepository $genreRepository */
    protected $genreRepository;

    public function __construct(GenreRepository $genreRepository)
    {
        $this->genreRepository       = $genreRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Genre::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('genre_name', function (Genre $genre) {
                    return $genre->genre_name;
                })
                ->editColumn('image', function (Genre $genre) {
                    return $genre->image_path;
                })
                ->editColumn('status', function (Genre $genre) {

                    return $genre->status_name;
                })
                ->addColumn('action', function ($row) {
                    return $row->action;
                })->rawColumns(['action', 'status','image'])->make(true);
        }

        return view('admin.genre.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        //
        $rawData    = new Genre;
        return view('admin.genre.create', ['model' => $rawData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $this->genreRepository->create($request->all());
        return redirect()->route('genres.index')->with('success', "Genre created successfully!");
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
     * @param Genre $genre [explicite description]
     *
     * @return void
     */
    public function edit(Genre $genre)
    {
        return view('admin.genre.edit', ['model' => $genre]);
    }


    public function update(EditRequest $request, Genre $genre)
    {
        $this->genreRepository->update($request->all(), $genre);

        return redirect()->route('genres.index')->with('success', "Genre updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Genre $genre)
    {
        $this->genreRepository->delete($genre);

        return redirect()->route('genres.index')->with('success', "Genre deleted successfully!");
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
        $genre  = Genre::find($input['user_id']);
        // dd($user);
        if ($this->genreRepository->changeStatus($input, $genre)) {
            return response()->json([
                'status' => true,
                'message' => 'Genre status updated successfully.'
            ]);
        }

        throw new Exception('Genre status does not change. Please check sometime later.');
    }



}
