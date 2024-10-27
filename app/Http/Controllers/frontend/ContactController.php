<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{

    public function contact()
    {
        return view('frontend.contact');
    }

    public function docontact(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|max:20',
                'content' => 'required|string',
                'title' => 'required|string|max:255',
            ]);

            Log::info('Contact Data:', $validatedData);

            $contact = Contact::create([
                'user_id' => Auth::id(),
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'content' => $validatedData['content'],
                'title' => $validatedData['title'],
                'status' => 1,
            ]);

            if (!$contact) {
                return back()->withErrors(['error' => 'Lưu thông tin liên hệ không thành công. Vui lòng thử lại.']);
            }

            return view('frontend.contact_massage');
        }

        
    }
}