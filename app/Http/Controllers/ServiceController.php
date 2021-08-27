<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->AuthLogin();
        $quantity_view = Session::get('admin_quantity_view', 9);
        $all_service = Service::orderBy('service_order', 'asc')->paginate($quantity_view);
        return view('admin.service.index', compact('all_service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->AuthLogin();
        $this->validate($request, [
            'service_name' => 'required',
            'service_desc' => 'required',
            'service_content' => 'required',
            'service_status' => 'required',
            'service_image' => 'required',
        ]);
        $service = new Service();
        $service->service_name = $request->service_name;
        $service->service_desc = $request->service_desc;
        $service->service_content = $request->service_content;
        $service->service_meta_data = $request->service_meta_data;
        $service->service_keyword = $request->service_keyword;
        $service->service_status = $request->service_status;
        $service->service_slug = url_slug($request->service_name) . '_' . date('dmYHis');
        $get_image = $request->file('service_image');
        if ($get_image) {
            $new_image = $service->service_slug . date('dmYHis')  . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/service', $new_image);
            $service->service_image = $new_image;
        } else {
            $service->service_image = '';
        }
        $service->save();
        Session::flash('message', 'Thêm dịch vụ thành công!');
        return Redirect::to('/admin/service/index');
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
        $this->AuthLogin();
        $service = Service::find($id);
        return view('admin.service.edit', compact('service'));
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
        $this->AuthLogin();
        $this->validate($request, [
            'service_name' => 'required',
            'service_desc' => 'required',
            'service_content' => 'required',
            'service_status' => 'required',
        ]);
        $service = Service::find($id);

        if ($request->service_name != $service->service_name) {
            $service->service_name = $request->service_name;
            $service->service_slug = url_slug($request->service_name) . '_' . date('dmYHis');
        }
        $service->service_desc = $request->service_desc;
        $service->service_content = $request->service_content;
        $service->service_meta_data = $request->service_meta_data;
        $service->service_keyword = $request->service_keyword;
        $service->service_status = $request->service_status;
        $img = $service->service_image;
        $get_image = $request->file('service_image');
        if ($get_image) {
            $new_image = $service->service_slug . date('dmYHis')  . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/service', $new_image);
            $service->service_image = $new_image;
            $image_path = "uploads/service/" . $img;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        $service->save();
        Session::flash('message', 'Sửa dịch vụ thành công!');
        return Redirect::to('/admin/service/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->AuthLogin();
        $service = Service::findOrFail($id);
        $img = $service->service_image;
        $image_path = "uploads/service/" . $img;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $service->delete();
        Session::flash('message', 'Xoá thành công!');
        return Redirect::to('/admin/service/index');
    }

    public function arrange_service(Request $request)
    {
        $this->AuthLogin();
        $page_id_array = $request->page_id_array;
        foreach ($page_id_array as $key => $value) {
            $service = Service::find($value);
            $service->service_order = $key;
            $service->save();
        }
        echo "true";
    }
}
