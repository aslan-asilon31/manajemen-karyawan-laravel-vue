<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MasterData\DepartmentMaster;
use App\Models\MasterData\FileMaster;
use App\Models\MasterData\RoleMaster;
use DB;

class UserController extends Controller
{
    public function index()
    {
        $sql = "SELECT u.*, d.name AS department_name, f.name AS file_name, r.name AS role_name
                FROM users u
                LEFT JOIN department_masters d ON u.department_id = d.id
                LEFT JOIN file_masters f ON u.file_id = f.id
                LEFT JOIN roles_masters r ON u.role = r.id
                ORDER BY u.created_at DESC
                ";

        $users = DB::select($sql);

        return $users;
    }
}
