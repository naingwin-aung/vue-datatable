<?php

namespace App\Http\Controllers\Backend;

use Inertia\Inertia;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $packages = Package::query()
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', "%{$request->search}%");
            })
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Package/Index', [
            'data'    => $packages,
            'search' => $request->search
        ]);
    }

    public function create()
    {
        return Inertia::render('Package/Create');
    }

    public function edit($id)
    {
        return Inertia::render('Package/Edit');
    }

    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();
    }
}
