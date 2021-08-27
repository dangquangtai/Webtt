<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $table = 'tbl_price';
    protected $primaryKey = 'id';
    protected $fillable = ['content',];
    public $timestamps = true;
}
