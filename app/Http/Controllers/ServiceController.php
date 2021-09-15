<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServiceCollection;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ServiceCollection|Service[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::where('active', true)->get();
        return new ServiceCollection($services);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ServiceCollection|ServiceResource|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'cost' => 'required|integer|max:9999999',
            'desc' => 'required|string|max:255',
        ]);

        $service = Service::create($request->all());

        return new ServiceResource($service);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ServiceCollection|ServiceResource|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::where('id', $id)->first();

        return new ServiceResource($service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return ServiceCollection|\Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'string|max:255',
            'cost' => 'integer|max:9999999',
            'desc' => 'string|max:255',
        ]);

        $service->update($request->all());

        return new ServiceResource($service);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return bool|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::where('id', $id)->first()->update(['active' => false]);

        return true;
    }
}
