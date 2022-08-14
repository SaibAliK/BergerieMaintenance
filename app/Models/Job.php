<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
	use HasFactory;
	protected $guarded=[];
	public function staff()
    {
        return $this->belongsto('App\Models\Staff');
    }
    public function issue()
    {
        return $this->belongsto('App\Models\Issue');
    }
    public function unit()
    {
        return $this->belongsto('App\Models\Unit');
    }
    public function loggedby()
    {
        return $this->belongsto(LoggedBy::class,'loggedBy_id','id');
    }
    public function jobAssign()
    {
        return $this->hasOne('App\Models\JobAssign');
    }

}
