<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Test extends Model
{
    use HasFactory;

    protected $table = 't_test';

    protected $fillable = [
        'FIELD_INT', 'FIELD_DATETIME', 'FIELD_VAR'
    ];

}
