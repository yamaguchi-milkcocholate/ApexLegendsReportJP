<?php

namespace Tests\Unit;

use App\Http\Controllers\ReportController;
use Tests\TestCase;

class ReportControllerTest extends TestCase
{
    public function testReport()
    {
        $controller = app(ReportController::class);
        $controller->Report();
        $this->assertTrue(true);
    }
}
