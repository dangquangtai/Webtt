<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'tbl_service';
    protected $primaryKey = 'service_id';
    protected $fillable = [
        'service_name', 'service_desc', 'service_image', 'service_content', 'service_meta_data', 'service_keyword',
        'service_status', 'service_order', 'service_view_count',
    ];
    public $timestamps = true;
}
