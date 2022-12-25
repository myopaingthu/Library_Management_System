<?php

namespace App\Http\Controllers;

use App\Contracts\Services\CategoryServiceInterface;
use App\Http\Requests\SaveCategoryRequest;
use DataTables;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * Category Service
     */
    private $categoryService;

    /**
     * Class Constructor
     *
     * @param CategoryServiceInterface $categoryService
     * @return void
     */
    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index');
    }

    /**
     * Return a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiIndex()
    {
        $categories = $this->categoryService->getCategories();
        return Datatables::of($categories)->editColumn('created_at', function ($book) {
            return $book->created_at->format('Y-m-d');
        })
            ->addColumn('action', function ($book) {
                $icon = '<button class="btn btn-sm btn-danger delete-button" data-id="' . $book->id . '"><i class="fas fa-trash"></i> Delete</button>';
                return $icon;
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SaveCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveCategoryRequest $request)
    {
        $this->categoryService->saveCategory($request->all());
        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->categoryService->deleteCategory($id);
        return response()->json(['success' => true], JsonResponse::HTTP_OK);
    }
}
