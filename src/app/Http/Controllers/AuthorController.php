<?php

namespace App\Http\Controllers;

use App\Contracts\Services\AuthorServiceInterface;
use App\Http\Requests\SaveAuthorRequest;
use DataTables;
use Illuminate\Http\JsonResponse;

class AuthorController extends Controller
{
    /**
     * Author Service
     */
    private $authorService;

    /**
     * Class Constructor
     *
     * @param AuthorServiceInterface $authorService
     * @return void
     */
    public function __construct(AuthorServiceInterface $authorService)
    {
        $this->authorService = $authorService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('authors.index');
    }

    /**
     * Return a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiIndex()
    {
        $authors = $this->authorService->getAuthors();
        return Datatables::of($authors)->editColumn('created_at', function ($author) {
            return $author->created_at->format('Y-m-d');
        })
            ->addColumn('action', function ($user) {
                $icon = '<button class="btn btn-sm btn-danger delete-button" data-id="' . $user->id . '"><i class="fas fa-trash"></i> Delete</button>';
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
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SaveAuthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveAuthorRequest $request)
    {
        $this->authorService->saveAuthor($request->all());
        return redirect()->route('authors.index')
            ->with('success', 'Author created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->authorService->deleteAuthor($id);
        return response()->json(['success' => true], JsonResponse::HTTP_OK);
    }
}
