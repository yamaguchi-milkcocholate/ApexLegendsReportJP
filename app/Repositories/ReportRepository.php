<?php

namespace App\Repositories;

use App\Entities\Report;

class ReportRepository
{
    /**
     * @param $hackerId
     */
    public function Save($hackerId)
    {
        $report = new Report();
        $report->fill(['hacker_id' => $hackerId]);
        $report->save();
    }

    /**
     * @return mixed
     */
    public function Fetch()
    {
        $all = Report::CreatedAtMoreThan(date('Y-m-d', strtotime('-3 days')))->get()->groupBy('hacker_id');
        return $all->map(function ($item, $key) {
            return collect([
                'last' => $item->sortByDesc('created_at')->first()->created_at->format('m/d H時i分'),
                'count' => $item->count(),
                'hacker_id' => $key,
            ]);
        });
    }
}
