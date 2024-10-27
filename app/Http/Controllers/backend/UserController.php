<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = User::where('status', '!=', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.user.index', compact('list'));
    }

    public function create()
    {
        return view('backend.user.create');
    }

    public function store(Request $request)
    {

        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = bcrypt($request->input('password'));
        $user->email = $request->email;
        $user->phone = $request->phone; 
        $user->roles = $request->roles;
        $user->address = $request->address;
        $user->created_at = now();
        $user->created_by = Auth::id() ?? 1;
        $user->status = $request->status;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move(public_path('public/user'), $filename);
            $user->image = 'public/user/'.$filename;
        }

        if ($user->save()) {
            return redirect()->route('admin.user.index')->with('message', ['type' => 'success', 'msg' => 'Thêm thành công!']);
        }

        return redirect()->route('admin.user.create')->with('message', ['type' => 'danger', 'msg' => 'Thêm thất bại!!']);
    }

    //chỉnh sửa
    public function edit($id)
    {
        $user = User::find($id);
        if (! $user) {
            return redirect()->route('admin.user.index')->with('error', 'user không tồn tại.');
        }

        return view('backend.user.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->username = $request->username;
            $user->password = bcrypt($request->password);
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->roles = $request->roles;
            $user->address = $request->address;
            $user->status = $request->status;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time().'-'.$file->getClientOriginalName();
                $file->move(public_path('public/user'), $filename);
                $user->image = 'public/user/'.$filename;
            }
            $user->save();

            return redirect()->route('admin.user.index')->with('success', 'cập nhật thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'cập nhật lỗi.');
        }
    }

    //xóa tạm thời
    public function delete($id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }

        $user->status = 0;
        $user->updated_at = date('Y-m-d H:i:s');
        

        $user->save();

        return redirect()->route('admin.user.index')->with('message', ['type' => 'success', 'msg' => ' di chuyển đến  thùng rác!']);
    }

    //thùng rác
    public function trash()
    {
        $user = User::where('status', '=', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.user.trash', compact('user'));
    }

    //khôi phục
    public function restore($id)
    {
        $user = User::where('id', $id)->where('status', 0)->first();
        if ($user) {
            $user->status = 1;
            $user->save();
        }

        return redirect()->route('admin.user.trash')->with('message', ['type' => 'success', 'msg' => 'khôi phục user thành công!']);
    }

    //xóa vĩnh viễn
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.user.trash');
    }
}
