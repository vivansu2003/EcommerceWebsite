<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Contact::where('contact.status', '!=', 0)
            ->join('user', 'user.id', '=', 'contact.user_id')
            ->orderBy('created_at', 'desc')
            ->select('user.name as user_name', 'user.email as user_email', 'contact.*')
            ->get();

        return view('backend.contact.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.contact.create');
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id); // Tìm contact theo ID và đảm bảo rằng nó tồn tại

        return view('backend.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Tìm contact cần cập nhật và đảm bảo rằng nó tồn tại
            $contact = Contact::findOrFail($id);

            // Cập nhật các trường thông tin từ request
            $contact->update($request->validated());

            return redirect()->route('admin.contact.index')->with('success', 'Cập nhật thành công');
        } catch (\Exception $e) {
            Log::error('Error updating contact: '.$e->getMessage());

            return redirect()->back()->with('error', 'Cập nhật không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function status(string $id)
    {
        //
    }
}
