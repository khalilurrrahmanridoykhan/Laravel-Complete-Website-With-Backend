<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class temp_files extends Model
{
    use HasFactory;
    protected $table = "temp_files";
    protected $primaryKey = "id";
}
