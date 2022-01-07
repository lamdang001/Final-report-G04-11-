<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Admin::where('role','<>',0)->get();
        return view('admin.staffs.list',['staffs' => $staffs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staffs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'sex' => $data['sex'],
            'identity_card' => $data['identity'],
            'role' => 1,
            'password' => bcrypt($data['password'])
        ]);
        return redirect()->route('staff.list')->with('success','Thêm nhân viên thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Admin::find($id);
        return view('admin.staffs.edit', ['staff' => $staff]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $staff = Admin::find($id);
        $staff->name = $data['name'];
        $staff->email = $data['email'];
        $staff->sex = $data['sex'];
        $staff->identity_card = $data['identity'];
        $staff->password = bcrypt($data['password']);
        $staff->save();
        return redirect()->route('staff.list')->with('success','Cập nhật nhân viên thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Admin::find($id);
        $staff->delete();
        return redirect()->route('staff.list')->with('success','Xóa nhân viên thành công');
    }
}
