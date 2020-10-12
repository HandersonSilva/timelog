<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IssueComponent extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'issue_id',
        'component_id'
    ];

    public function issue()
    {
        return $this->belongsTo('App\Models\Issue');
    }

    public function component()
    {
        return $this->belongsTo('App\Models\Component');
    }
}
