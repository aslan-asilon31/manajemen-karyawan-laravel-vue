<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\MasterData\DepartmentMaster;
use App\Models\MasterData\FileMaster;
use App\Models\MasterData\RoleMaster;
use DB;


class UserController extends Controller
{
    public function index()
    {
        // $sql = "SELECT u.*, d.name AS department_name, f.name AS file_name, r.name AS role_name
        //         FROM users u
        //         LEFT JOIN department_masters d ON u.department_id = d.id
        //         LEFT JOIN file_masters f ON u.file_id = f.id
        //         LEFT JOIN roles_masters r ON u.role = r.id
        //         ORDER BY u.created_at DESC
        //         LIMIT 10";

        // $users = DB::select($sql);


        $users = User::select('users.*', 'department_masters.name AS department_name', 'file_masters.name AS file_name', 'roles_masters.name AS role_name')
            ->leftJoin('department_masters', 'users.department_id', '=', 'department_masters.id')
            ->leftJoin('file_masters', 'users.file_id1', '=', 'file_masters.id')
            ->leftJoin('roles_masters', 'users.role_id', '=', 'roles_masters.id')
            ->orderBy('users.created_at', 'DESC')
            ->paginate(10);

        return view('users.index', compact('users'));
    }
    
    public function create()
    {
        $roles = RoleMaster::all();
        $departments = DepartmentMaster::all();
        return view('users.create' , compact('roles','departments'));
    }

    public function store(Request $request)
    {

        $file_cv = $request->file('cv');
        if($file_cv){
            $file_cv->storeAs('public/users', $file_cv->hashName());
        }else{
            $file_cv = null;
        }
        
        $file_sop = $request->file('sop');
        if($file_sop){
            $file_sop->storeAs('public/users', $file_sop->hashName());
        }else{
            $file_sop = null;
        }
        
        $file_other = $request->file('file_other');
        if($file_other){
            $file_other->storeAs('public/users', $file_other->hashName());
        }else{
            $file_other = null;
        }
        
        $image = $request->file('image');
        if($image){
            $image->storeAs('public/users', $image->hashName());
        }else{
            $image = null;
        }
        
        // $department_id = DepartmentMaster::where('id',$request->department_id)->first();
        // $role_id = RoleMaster::where('id',$request->role_id)->first();

        $userData = [
            'department_id' => $request->department_id ,
            'file_id1' => $file_cv ? $file_cv->hashName() : null,
            'file_id2' => $file_sop ? $file_sop->hashName() : null,
            'file_id3' => $file_other ? $file_other->hashName() : null,
            'name' => $request->name,
            'email' => $request->email,
            'image' => $image ? $image->hashName() : null,
            'role_id' => $request->role_id ,
            'department' => $request->department,
            'date_birth' => $request->date . '-' . $request->month . '-' . $request->year,
            'place_birth' => $request->place_birth,
        ];

        // dd($userData);
        $user = User::create($userData);

        if($user){
            //redirect dengan pesan sukses
            return redirect()->route('users.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('users.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(User $user)
    {
        $roles = RoleMaster::all();
        $departments = DepartmentMaster::all();
        return view('users.edit', compact('user','roles','departments'));
    }


    public function update(Request $request, User $user)
    {
        
        // Check if an image file is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image file
            Storage::disk('local')->delete('public/users/' . $user->image);

            // Upload the new image file
            $image = $request->file('image')->store('public/users');

            // Update the image field in the user model
            $user->image = basename($image);
        }

        // Update other fields
        $user->department_id = $request->department_id;
        $user->file_id1 = $request->file_cv;
        $user->file_id2 = $request->file_sop;
        $user->file_id3 = $request->file_other;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->department = $request->department;
        $user->date_birth = $request->date . '-' . $request->month . '-' . $request->year;
        $user->place_birth = $request->place_birth;

        // Save the updated user data
        $user->save();

        // Redirect with success message
        return redirect()->route('users.index')->with('success', 'Data Berhasil Diupdate!');
    }

    public function destroy($user)
    {
        $users = User::findOrFail($user);
        Storage::disk('local')->delete('public/users/'.$users->image);
        $users->delete();

        if($users){
            //redirect dengan pesan sukses
            return redirect()->route('users.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('users.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }




    

}
