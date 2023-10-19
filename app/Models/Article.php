<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{    
    protected $table = 'baiviet';
    protected $primaryKey = 'ma_bviet';
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'ma_bviet',
        'tieude',
        'ten_bhat',
        'ma_tloai',
        'tomtat',
        'noidung',
        'ma_tgia',
        'ngayviet',
        'hinh'
    ];
    public function category():BelongsTo{
        return $this->belongsTo(Category::class,'ma_tloai','ma_tloai');
    }
    public function author():BelongsTo{
        return $this->belongsTo(Author::class,'ma_tgia','ma_tgia');
    }
}

