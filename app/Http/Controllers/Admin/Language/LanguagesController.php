<?php

namespace App\Http\Controllers\Admin\Language;

use App\Http\Controllers\Controller;
use App\Http\Requests\Language\CreateRequest;
use App\Http\Requests\Language\EditRequest;
use App\Http\Requests\Banner\PDFRequest;
use App\Models\Language;

use App\Repositories\LanguageRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class LanguagesController extends Controller
{
    /** \App\Repository\LanguageRepository $languageRepository */
    protected $languageRepository;

    public function __construct(LanguageRepository $languageRepository)
    {
        $this->languageRepository       = $languageRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Language::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('language_name', function (Language $language) {
                    return $language->language_name;
                })
                ->editColumn('image', function (Language $language) {
                    return $language->image_path;
                })
                ->editColumn('status', function (Language $language) {

                    return $language->status_name;
                })
                ->addColumn('action', function ($row) {
                    return $row->action;
                })->rawColumns(['action', 'status','image'])->make(true);
        }

        return view('admin.language.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        //
        $rawData    = new Language;
        return view('admin.language.create', ['model' => $rawData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $this->languageRepository->create($request->all());
        return redirect()->route('languages.index')->with('success', "Language created successfully!");
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
     * @param Language $language [explicite description]
     *
     * @return void
     */
    public function edit(Language $language)
    {
        return view('admin.language.edit', ['model' => $language]);
    }


    public function update(EditRequest $request, Language $language)
    {
        $this->languageRepository->update($request->all(), $language);

        return redirect()->route('languages.index')->with('success', "Language updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        $this->languageRepository->delete($language);

        return redirect()->route('languages.index')->with('success', "Language deleted successfully!");
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
        $language  = Language::find($input['user_id']);
        // dd($user);
        if ($this->languageRepository->changeStatus($input, $language)) {
            return response()->json([
                'status' => true,
                'message' => 'Language status updated successfully.'
            ]);
        }

        throw new Exception('Language status does not change. Please check sometime later.');
    }



}