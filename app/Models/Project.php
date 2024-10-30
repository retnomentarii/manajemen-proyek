<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'member_id',
        'jenis_id',
        'deadline',
        'keterangan',
        'harga',
        'status',
        'tipe_project_id',
        'client_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'member_id');
    }

    public function member()
    {
        return $this->belongsToMany(User::class, 'member_projects');
    }
    public function jenisProject()
    {
        return $this->belongsTo(JenisProject::class, 'tipe_project_id');
    }


    public function users()
    {
        return $this->belongsToMany(User::class, 'member_projects');
    }
}
