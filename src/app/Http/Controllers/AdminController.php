<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Contracts\Services\AdminServiceInterface;

class AdminController extends Controller
{
    /**
     * Admin Service Interface
     */
    private $adminService;
    public function __construct(AdminServiceInterface $adminServiceInterface)
    {
        $this->adminService = $adminServiceInterface;
    }
    /**
     * Display count of admin dashboard
     *
     * @return array $count
     */
    public function index()
    {
        $counts = $this->adminService->getAdminDataTotalCount();
        $class = ['bg-grow-early', 'bg-arielle-smile', 'bg-midnight-bloom'];
        return view('dashboard.index', compact('counts', 'class'));
    }
}
