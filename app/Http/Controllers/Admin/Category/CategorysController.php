<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateRequest;
use App\Http\Requests\Category\EditRequest;
use App\Http\Requests\Banner\PDFRequest;
use App\Models\Category;

use App\Repositories\CategoryRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class CategorysController extends Controller
{
    /** \App\Repository\CategoryRepository $categoryRepository */
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository       = $categoryRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Category::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('category_name', function (Category $category) {
                    return $category->category_name;
                })
                ->editColumn('image', function (Category $category) {
                    return $category->image_path;
                })
                ->editColumn('status', function (Category $category) {

                    return $category->status_name;
                })
                ->addColumn('action', function ($row) {
                    return $row->action;
                })->rawColumns(['action', 'status','image'])->make(true);
        }

        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        //
        $rawData    = new Category;
        return view('admin.category.create', ['model' => $rawData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $this->categoryRepository->create($request->all());
        return redirect()->route('categorys.index')->with('success', "Category created successfully!");
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
     * @param Category $category [explicite description]
     *
     * @return void
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', ['model' => $category]);
    }


    public function update(EditRequest $request, Category $category)
    {
        $this->categoryRepository->update($request->all(), $category);

        return redirect()->route('categorys.index')->with('success', "Category updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Category $category)
    {
        $this->categoryRepository->delete($category);

        return redirect()->route('categorys.index')->with('success', "Category deleted successfully!");
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
        $category  = Category::find($input['user_id']);
        // dd($user);
        if ($this->categoryRepository->changeStatus($input, $category)) {
            return response()->json([
                'status' => true,
                'message' => 'Category status updated successfully.'
            ]);
        }

        throw new Exception('Category status does not change. Please check sometime later.');
    }



}
