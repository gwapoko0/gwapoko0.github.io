<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class insertDataModel extends Model
{
    use HasFactory;

    protected $table = 'dash_table';
    protected $fillable = ['name','badge','area','supervisor','pts','trans_date','remarks','trans_by'];
}
