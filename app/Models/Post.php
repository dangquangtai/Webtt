<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'tbl_post';
    protected $primaryKey = 'post_id';
    protected $fillable = [
        'post_name', 'post_desc', 'post_image', 'post_content', 'post_meta_data', 'post_keyword',
        'post_status', 'post_order', 'post_view_count',
    ];
    public $timestamps = true;
}
