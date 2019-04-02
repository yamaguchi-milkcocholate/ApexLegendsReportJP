<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Services\WebDriverService;

class ReportController extends Controller
{
    /**
     * @var WebDriverService
     */
    private $webDriver;

    /**
     * ReportController constructor.
     * @param WebDriverService $webDriver
     */
    public function __construct(WebDriverService $webDriver)
    {
        $this->webDriver = $webDriver;
    }

    public function Report(ReportRequest $request)
    {
        return response()->json([
            'success' => $this->webDriver->Submit(
                $request->input('id'),
                $request->input('first_name'),
                $request->input('last_name'),
                $request->input('email'),
                $request->input('message'),
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
