<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Component extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'created_at', 'updated_at',
    ];

    protected $fillable = ['name'];

    /**
     * Relacionamento com a tabela de issueComponents
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function issueComponent()
    {
        return $this->hasMany('App\Models\IssueComponent');
    }
}
