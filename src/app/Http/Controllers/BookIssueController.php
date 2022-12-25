<?php

namespace App\Http\Controllers;

use App\Contracts\Services\IssueBookServiceInterface;
use App\Enums\IssueStatus;
use App\Http\Requests\SaveBookIssueRequest;
use App\ViewModels\BookIssueViewModel;
use Illuminate\Http\Request;
use DataTables;

class BookIssueController extends Controller
{
    /**
     * book issue Service
     */
    private $issueBookService;

    /**
     * Class Constructor
     *
     * @param IssueBookServiceInterface $issueBookService
     * @return void
     */
    public function __construct(IssueBookServiceInterface $issueBookService)
    {
        $this->issueBookService = $issueBookService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('issue_books.index');
    }

    /**
     * Return a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiIndex()
    {
        $book_issues = $this->issueBookService->getIssueBooks();
        return Datatables::of($book_issues)
            ->addColumn('user_name', function ($book_issue) {
            return $book_issue->user->name;
            })
            ->addColumn('book_name', function ($book_issue) {
                return $book_issue->book->name;
            })
            ->addColumn('user_email', function ($book_issue) {
                return $book_issue->user->email;
            })
            ->addColumn('user_phone', function ($book_issue) {
                return $book_issue->user->phone;
            })
            ->addColumn('user_address', function ($book_issue) {
                return $book_issue->user->address;
            })
            ->editColumn('issue_date', function ($book_issue) {
                return $book_issue->issue_date->format('Y-m-d');
            })
            ->editColumn('return_date', function ($book_issue) {
                return $book_issue->return_date->format('Y-m-d');
            })
            ->editColumn('status', function ($book_issue) {
                return IssueStatus::getLabel($book_issue->issue_status);
            })
            ->addColumn('action', function ($book_issue) {
                $icon = '<a href="' . route('issue-books.edit', [$book_issue->id]) . '" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i>Edit</a>';
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
        $view_model = new BookIssueViewModel();
        return view('issue_books.create', $view_model);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SaveBookIssueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveBookIssueRequest $request)
    {
        $this->issueBookService->saveIssueBook($request->all());
        return redirect()->route('issue-books.index')
            ->with('success', 'Book Issue created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = $this->issueBookService->getBookAndFine($id);
        return view('issue_books.edit', compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $this->issueBookService->markBookAsReturned($id);
        return redirect()->route('issue-books.index')
            ->with('success', 'Marked book as returned successfully.');
    }
}
