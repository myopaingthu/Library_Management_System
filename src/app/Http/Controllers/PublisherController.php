<?php

namespace App\Http\Controllers;

use App\Contracts\Services\PublisherServiceInterface;
use App\Http\Requests\SavePublisherRequest;
use DataTables;
use Illuminate\Http\JsonResponse;

class PublisherController extends Controller
{
    /**
     * Publisher Service
     */
    private $publisherService;

    /**
     * Class Constructor
     *
     * @param PublisherServiceInterface $publisherService
     * @return void
     */
    public function __construct(PublisherServiceInterface $publisherService)
    {
        $this->publisherService = $publisherService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('publishers.index');
    }

    /**
     * Return a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiIndex()
    {
        $publishers = $this->publisherService->getPublishers();
        return Datatables::of($publishers)->editColumn('created_at', function ($publisher) {
            return $publisher->created_at->format('Y-m-d');
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
        return view('publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SavePublisherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePublisherRequest $request)
    {
        $this->publisherService->savePublisher($request->all());
        return redirect()->route('publishers.index')
            ->with('success', 'Publisher created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->publisherService->deletePublisher($id);
        return response()->json(['success' => true], JsonResponse::HTTP_OK);
    }
}
