<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'tbl_contact';
    protected $primaryKey = 'contact_id';
    protected $fillable = [
        'contact_name', 'contact_address', 'contact_phone', 'contact_email', 'contact_desc',
        'contact_content', 'contact_status',
    ];
    public $timestamps = true;
}
