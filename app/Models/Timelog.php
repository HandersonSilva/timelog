<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timelog extends Model
{
    use HasFactory;

    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'issue_id',
        'user_id',
        'seconds_logged'
    ];

    public function issue()
    {
        return $this->belongsTo('App\Models\Issue');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
