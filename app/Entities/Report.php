<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * Class Report
 * @package App\Entities
 */
class Report extends Model
{
    /**
     * @var string
     */
    protected $table = 'reports';

    protected $fillable = [
        'hacker_id'
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'updated_at'
    ];

    /**
     * @param $query Builder
     * @param $createdAt string
     * @return mixed
     */
    public function scopeCreatedAtMoreThan($query, $createdAt)
    {
        return $query->where('created_at', '>', $createdAt);
    }
}
