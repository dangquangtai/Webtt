<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function AuthLogin()
    {
        $login = Auth::id();
        if ($login) {
            return Redirect::to('/dashboard');
        } else {
            return Redirect::to('/admin')->send();
        }
    }

    public function index()
    {
        $this->AuthLogin();
        $all_contact = Contact::orderBy('contact_id', 'desc')->paginate(9);
        return view('admin.contact.index', compact('all_contact'));
    }

    public function show($id)
    {
        $this->AuthLogin();
        $contact = Contact::findOrFail($id);
        return view('admin.contact.show', compact('contact'));
    }

    public function destroy($id)
    {
        $this->AuthLogin();
        $contact = Contact::findOrFail($id);
        $contact->delete();
        Session::flash('message', 'Xóa thành công!');
        return redirect()->back();
    }

    public function status_pending($id)
    {
        $this->AuthLogin();
        $contact = Contact::findOrFail($id);
        $contact->contact_status = 0;
        $contact->save();
        Session::flash('message', 'Thay đổi trạng thái thành công!');
        return Redirect::to('/admin/contact/index');
    }

    public function status_success($id)
    {
        $this->AuthLogin();
        $contact = Contact::findOrFail($id);
        $contact->contact_status = 1;
        $contact->save();
        Session::flash('message', 'Thay đổi trạng thái thành công!');
        return Redirect::to('/admin/contact/index');
    }
}
