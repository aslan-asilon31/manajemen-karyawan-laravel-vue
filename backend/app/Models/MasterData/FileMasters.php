<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileMasters extends Model
{
    use HasFactory;

    protected $table = 'file_masters';
    protected $primaryKey = 'file_id';

    protected $fillable = [
        'file_id',
        'name',
        'file',
        'desc',
    ];
}
