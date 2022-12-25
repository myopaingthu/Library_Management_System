<?php

namespace App\Http\Controllers;

use App\Contracts\Services\UserServiceInterface;
use App\Http\Requests\SaveUserRequest;
use App\Http\Requests\EditUserRequest;
use DataTables;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * User Service
     */
    private $userService;

    /**
     * Class Constructor
     *
     * @param UserServiceInterface $userService
     * @return void
     */
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Return a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiIndex()
    {
        $users = $this->userService->getUsers();
        return Datatables::of($users)->editColumn('created_at', function ($user) {
            return $user->created_at->format('Y-m-d');
        })
            ->addColumn('action', function ($user) {
                $icon = '<a href="' . route('users.edit', [$user->id]) . '" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i>Edit</a><button class="btn btn-sm btn-danger delete-button" data-id="' . $user->id . '"><i class="fas fa-trash"></i> Delete</button>';
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
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SaveUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveUserRequest $request)
    {
        $this->userService->saveUser($request->all());
        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userService->findUserById($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EditUserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        $this->userService->updateUser($request->all(), $id);
        return redirect()->route('users.index')
            ->with('success', 'User edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->userService->deleteUser($id);
        return response()->json(['success' => true], JsonResponse::HTTP_OK);
    }
}
