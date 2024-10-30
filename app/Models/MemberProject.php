<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberProject extends Model
{
    protected $fillable = [
        'member_id',
        'project_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'member_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
