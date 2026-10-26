<?php
namespace App\Http\Controllers;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller 
{
    public function index()
    {
        return view('users.index',['users'=>User::with('role')->orderBy('id','desc')->paginate(15)]);
    }
    public function create()
    {
        return view('users.form',['user'=>new User,'roles'=>Role::all()]);
    }
    public function store(Request $request)
    {
        $data=$request->validate(['name'=>'required|string|max:255','email'=>'required|email|unique:users,email','password'=>'required|string|min:8','role_id'=>'required|exists:roles,id','is_active'=>'required|boolean']);
        $data['password']=Hash::make($data['password']);
        User::create($data);
        return redirect()->route('users.index')->with('success','User created.');
    }
    public function edit(User $user)
    {
        return view('users.form',compact('user')+['roles'=>Role::all()]);
    }
    public function update(Request $request,User $user)
    {
        $data=$request->validate(['name'=>'required|string|max:255','email'=>'required|email|unique:users,email,'.$user->id,'password'=>'nullable|string|min:8','role_id'=>'required|exists:roles,id','is_active'=>'required|boolean']);
        if(!empty($data['password']))
        {
            $data['password']=Hash::make($data['password']);
        }
        else
        {
            unset($data['password']);
        }
        if($user->id===auth()->id() && !$data['is_active'])
        {
            return back()->withErrors(['is_active'=>'You cannot deactivate your own account.']);
        }
        $user->update($data);
        return redirect()->route('users.index')->with('success','User updated.');
    }
}
