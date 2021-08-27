<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailConfirm;
use App\Mail\ConfirmMail;
use App\Models\Contact;
use App\Models\Library;
use App\Models\Post;
use App\Models\Price;
use App\Models\Service;
use App\Models\Visitor;
use App\Rules\Captcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $vistor = Visitor::where('ip', $request->ip())->first();
        if (isset($vistor)) {
            $vistor->count = $vistor->count + 1;
            $vistor->save();
        } else {
            $vistor = new Visitor();
            $vistor->count = 1;
            $vistor->ip = $request->ip();
            $vistor->save();
        }
        $service_index = Service::orderBy('service_view_count', 'desc')->limit(3)->get();
        return view('pages.index', compact('service_index'))->with('home', 'active');
    }

    public function price()
    {
        $price = Price::firstOrFail();
        return view('pages.price', compact('price'));
    }

    public function service()
    {
        $service = Service::orderBy('service_order', 'asc')->paginate(9);
        return view('pages.service')->with('service', $service);
    }

    public function service_detail($slug)
    {
        $service = Service::where('service_slug', $slug)->firstOrFail();
        $service->service_view_count = $service->service_view_count + 1;
        $service->save();
        return view('pages.service_detail')->with('service', $service);
    }

    public function post()
    {
        $post = Post::orderBy('post_order', 'asc')->paginate(9);
        return view('pages.post')->with('post', $post);
    }

    public function post_detail($slug)
    {
        $post = Post::where('post_slug', $slug)->firstOrFail();
        $post->post_view_count = $post->post_view_count + 1;
        $post->save();
        return view('pages.post_detail')->with('post', $post);
    }

    public function contact()
    {
        return view('pages.contact')->with('contact', 'active');
    }

    public function send_contact(Request $request)
    {
        $this->validate($request, [
            'contact_email'  => 'required|email|max:50',
            'contact_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'contact_address' => 'required|max:255',
            'contact_name' => 'required|max:255',
            'g-recaptcha-response' => new Captcha(),
        ]);

        $contact = new Contact();
        $contact->contact_name = $request->contact_name;
        $contact->contact_phone = $request->contact_phone;
        $contact->contact_email = $request->contact_email;
        $contact->contact_address = $request->contact_address;
        $contact->contact_desc = $request->contact_desc;
        $contact->contact_content = $request->contact_content;
        $contact->save();
        $service = Service::paginate(9);
        $email  = new SendMailConfirm($request->contact_email);
        dispatch($email);
        return view('pages.contact_success', compact('service'))->with('customer_name', $request->contact_name);
    }

    public function about()
    {

        return view('pages.about');
    }

    public function library()
    {
        $library = Library::orderBy('order', 'asc')->paginate(9);
        return view('pages.library')->with('library', $library);
    }

    public function library_detail($slug)
    {
        $library = Library::where('slug', $slug)->firstOrFail();
        $library->view_count =  $library->view_count + 1;
        $library->save();
        return view('pages.library_detail')->with('library', $library);
    }
}
