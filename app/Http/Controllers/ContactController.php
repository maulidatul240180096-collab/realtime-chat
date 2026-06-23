<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
   public function index()
{
    $contacts = Contact::where('user_id', auth()->id())->get();

    foreach ($contacts as $contact) {

        $contact->registeredUser = User::where(
            'phone',
            $contact->contact_phone
        )->first();

    }

    return view('contacts.index', compact('contacts'));
}

 public function create()
    {
        return view('contacts.create');
    }

public function store(Request $request)
{
    $request->validate([
        'contact_name' => 'required',
        'contact_phone' => 'required',
    ]);

    // normalize nomor
    $phone = $request->contact_phone;

    // buang spasi
    $phone = str_replace(' ', '', $phone);

    // paksa tetap 08
if (substr($phone, 0, 1) != '0') {
    $phone = '0' . $phone;
}

    Contact::create([
        'user_id' => Auth::id(),
        'contact_name' => $request->contact_name,
        'contact_phone' => $phone,
    ]);

        return redirect()->route('contacts.index');
    }
}
