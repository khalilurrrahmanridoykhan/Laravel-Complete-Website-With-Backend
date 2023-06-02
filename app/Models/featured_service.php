<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class featured_service extends Model
{
    use HasFactory;
    protected $table = "featured_services";
    protected $primaryKey = "featured_services_id";
}
