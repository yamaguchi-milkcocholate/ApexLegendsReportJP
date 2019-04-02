<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Repositories\ReportRepository;
use App\Services\WebDriverService;
use Facebook\WebDriver\Exception\NoSuchElementException;
use Facebook\WebDriver\Exception\TimeOutException;

class ReportController extends Controller
{
    /**
     * @param ReportRepository $repository
     * @return \Illuminate\Http\JsonResponse
     */
    public function Index(ReportRepository $repository)
    {
        try {
            return response()->json([
                'success' => true,
                'data' => $repository->Fetch()
            ], 200);
        }
        catch(\Exception $exception){
            return response()->json([
                'success' => false,
            ], 422);
        }
    }

    /**
     * @param ReportRequest $request
     * @param ReportRepository $repository
     * @param WebDriverService $webDriver
     * @return \Illuminate\Http\JsonResponse
     */
    public function Report(ReportRequest $request, ReportRepository $repository, WebDriverService $webDriver)
    {
        try {
            $webDriver->Submit(
                $request->input('id'),
                $request->input('first_name'),
                $request->input('last_name'),
                $request->input('email'),
                $request->input('message'));
            $repository->Save($request->input('hacker_id'));
            return response()->json([
                'success' => true
            ], 200);
        } catch (NoSuchElementException | TimeOutException $exception) {
            return response()->json([
                'success' => false
            ], 422);
        }
    }

    /**
     * @param ReportRequest $request
     * @param ReportRepository $repository
     * @return \Illuminate\Http\JsonResponse
     */
    public function Test(ReportRequest $request, ReportRepository $repository)
    {
        $repository->Save($request->input('hacker_id'));
        usleep(3000000);
        return response()->json([
            'success' => true,
            'data' => $request->all()
        ], 200);
    }
}
