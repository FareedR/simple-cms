<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Service;

class ServiceController extends Controller
{
    public function listService()
    {
        $services = Service::all();
        return view('admin.services.index',compact('services'));
    }

    public function createService()
    {
        return view('admin.services.create');
    }

    public function storeService(Request $request)
    {
        $service = new Service([
            'icon' => $request->get('icon'),
            'title' => $request->get('title'),
            'description' => $request->get('description')
        ]);
        $service->save();
        toastr()->success('Service has been added!');
        return redirect()->route('list-service');
    }

    public function editService($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit',compact('service'));
    }

    public function updateService(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->title = $request->get('title');
        $service->description = $request->get('description');
        $service->save();
        toastr()->success('Service has been updated');
        return redirect()->route('list-service');
    }

    public function deleteService($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
    }
}
