<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Repositories\ReportRepository;
use App\Services\WebDriverService;

class ReportController extends Controller
{
    /**
     * @var WebDriverService
     */
    private $webDriver;

    /**
     * @var ReportRepository
     */
    private $repository;

    /**
     * ReportController constructor.
     * @param WebDriverService $webDriver
     * @param ReportRepository $repository
     */
    public function __construct(WebDriverService $webDriver, ReportRepository $repository)
    {
        $this->webDriver = $webDriver;
        $this->repository = $repository;
    }

    public function Report(ReportRequest $request)
    {
        return response()->json([
            'success' => $this->webDriver->Submit(
                $request->input('id'),
                $request->input('first_name'),
                $request->input('last_name'),
                $request->input('email'),
                $request->input('message')
            )
        ]);
    }

    public function Test(ReportRequest $request)
    {
        return response()->json([
            'success' => true,
            'data' => $request->all()
        ]);
    }
}
