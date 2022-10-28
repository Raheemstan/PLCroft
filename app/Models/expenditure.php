<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expenditure extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'expence_desc', 'trans_date', 'created_by'];
}
