<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManuSortable extends Model
{
    use HasFactory;
    protected $table = "manu_sortables";
    protected $primaryKey = "manu_sortables_id";
}
