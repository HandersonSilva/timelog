<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issue extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = ['code'];

    /**
     * Relacionamento com a tabela IssueComponents
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function issueComponent()
    {
        return $this->hasMany('App\Models\IssueComponent');
    }
}
