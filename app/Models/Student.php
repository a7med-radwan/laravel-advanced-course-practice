<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'email'];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}
