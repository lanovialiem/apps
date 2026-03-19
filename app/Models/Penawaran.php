<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penawaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'subject_name',
        'category_penawaran',
        'contact_person',
        'no_quotation',
        'purposed_value',
        'date_sph',
        'description',
        'upload_dokumen',
    ];
}
