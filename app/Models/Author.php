<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'tacgia';
    protected $primaryKey = 'ma_tgia';
    protected $fillable = [
        'ma_tgia',
        'ten_tgia',
        'hinh_tgia'
    ];
    public $timestamps = false;
    public function article(){
        return $this->hasMany(Article::class,'ma_bviet');
    }
    //Truyền dữ liệu vào

}
