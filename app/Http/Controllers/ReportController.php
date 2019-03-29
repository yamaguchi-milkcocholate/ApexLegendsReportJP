<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Repositories\FormRepository;
use App\Services\ChromeDriverService;

class ReportController extends Controller
{
    public function Report(ReportRequest $request)
    {
        $validated = $request->validated();
        $service = app(ChromeDriverService::class);
        $driver = $service->Driver();
        $repository = app(FormRepository::class);
        $result = $repository->Submit($driver);
        $json = collect();
        $json->put('success', $result);
        return $json->toJson();
    }

    public function Test(ReportRequest $request)
    {
        $validated = $request->validated();
        $json = collect();
        $json->put('success', true);
        $json->put('data', $validated);
        return $json->toJson();
    }
}
