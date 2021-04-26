<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'slug' , 'status' , 'user_id' , 'description'];

    protected $attributes = [
        'hit' => 300
    ];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
