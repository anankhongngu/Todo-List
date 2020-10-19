<?php

namespace App;

use App\Category;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'category_id', 'user_id', 'order'];

    public function category() {
    	return $this->hasOne(Category::class);
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }
}
