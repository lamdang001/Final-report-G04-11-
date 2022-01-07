<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function showEditForm($id)
    {
        $user = User::find($id);
        return view('web.form_edit_user',['user' => $user]);
    }

    public function handleEditUser(Request $request, $id)
    {
        $data = $request->all();
        $user = User::find($id);
        $user->name = $data['name'];
        $user->phone = $data['phone'];
        $user->save();
        return redirect()->back()->with('success','Cập nhật thông tin thành công');
    }
}
