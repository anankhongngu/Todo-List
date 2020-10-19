<?php

namespace App;

use App\Task;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    public function tasks() {
    	return $this->hasMany(Task::class);
    }
}
