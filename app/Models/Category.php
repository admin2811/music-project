<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'theloai';
    protected $primaryKey = 'ma_tloai';
    public $timestamps = false;
    protected $fillable = [
        'ma_tloai',
        'ten_tloai',
    ];
    public function article(){
        return $this->hasMany(Article::class,'ma_bviet');
    }
}
