<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;
    protected $table = 'tbl_library';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'desc', 'image', 'content', 'meta_data', 'keyword',
        'status', 'order', 'view_count',
    ];
    public $timestamps = true;
}
