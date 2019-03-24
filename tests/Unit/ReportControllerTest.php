<?php

namespace Tests\Unit;

use App\Http\Controllers\ReportController;
use Tests\TestCase;

class ReportControllerTest extends TestCase
{
    public function testReport()
    {
        $controller = app(ReportController::class);
        $this->assertTrue($controller->Report());
    }
}
