<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobAssign extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function job()
    {
        return $this->belongsto('App\Models\Job');
    }

}
