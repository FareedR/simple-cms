<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Contact;

class ContactController extends Controller
{
    public function showContactUs()
    {
        $contact = Contact::firstOrNew(
            ['id' => 1],
            ['address' => ''],
            ['tel_no' => ''],
            ['phone_no' => ''],
            ['email' => ''],
            ['weekdays' => ''],
            ['saturday' => ''],
            ['sunday' => '']
        );
        return view('admin.contact-us',compact('contact'));
    }

    public function updateContactUs(Request $request)
    {
        $contact = Contact::updateOrCreate(
            ['id' => 1],
            [
                'address' => $request->get('address'),
                'tel_no' => $request->get('tel_no'),
                'phone_no' => $request->get('phone_no'),
                'email' => $request->get('email'),
                'weekdays' => $request->get('weekdays'),
                'saturday' => $request->get('saturday'),
                'sunday' => $request->get('sunday')
            ]
        );
        toastr()->success('Contact Us page has been updated');
        return redirect()->route('show-contact-us');
    }
}
