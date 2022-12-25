<?php

namespace App\Http\Controllers;

use App\Contracts\Services\BookServiceInterface;
use App\Http\Requests\SaveBookRequest;
use App\ViewModels\BookViewModel;
use Illuminate\Http\JsonResponse;
use DataTables;
use App\Enums\BookStatus;

class BookController extends Controller
{
    /**
     * Category Service
     */
    private $bookService;

    /**
     * Class Constructor
     *
     * @param BookServiceInterface $bookService
     * @return void
     */
    public function __construct(BookServiceInterface $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('books.index');
    }

    /**
     * Return a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiIndex()
    {
        $books = $this->bookService->getBooks();
        return Datatables::of($books)
            ->editColumn('status', function ($book) {
                return BookStatus::getLabel($book->status);
            })
            ->addColumn('category', function ($book) {
                return $book->category->name;
            })
            ->addColumn('author', function ($book) {
                return $book->author->name;
            })
            ->addColumn('publisher', function ($book) {
                return $book->publisher->name;
            })
            ->addColumn('action', function ($book) {
                $icon = '<a href="' . route('books.show', [$book->id]) . '" class="btn btn-sm btn-info"><i class="fas fa-eye"></i>View</a>
                    <a href="' . route('books.edit', [$book->id]) . '" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i>Edit</a>
                    <button class="btn btn-sm btn-danger delete-button" data-id="' . $book->id . '"><i class="fas fa-trash"></i>Delete</button>';
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
        $view_model = new BookViewModel();
        return view('books.create', $view_model);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SaveBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveBookRequest $request)
    {
        $this->bookService->saveBook($request->all());
        return redirect()->route('books.index')
            ->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = $this->bookService->getBookById($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = $this->bookService->getBookById($id);
        $view_model = new BookViewModel($book);
        return view('books.edit', $view_model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SaveBookRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveBookRequest $request, $id)
    {
        $this->bookService->saveBook($request->all(), $id);
        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->bookService->deleteBookById($id);
        return response()->json(['success' => true], JsonResponse::HTTP_OK);
    }
}
