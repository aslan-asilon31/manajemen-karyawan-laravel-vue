<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleMaster extends Model
{
    use  HasFactory;

    protected $table = 'roles_masters';
    protected $primaryKey = 'roles_id';

    protected $fillable = [
        'roles_id',
        'name',
    ];
}
