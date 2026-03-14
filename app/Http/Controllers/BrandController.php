<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    // Brand List Page
    public function index()
    {
        return view('admin.brand.index');
    }

    // Yajra DataTable Ajax
    public function getData(Request $request)
    {
        $brands = Brand::latest()->get();
        return DataTables::of($brands)
            ->addIndexColumn()
            ->addColumn('logo', function ($row) {
                $logo = $row->logo ? asset($row->logo) : 'https://via.placeholder.com/50';
                return '<img src="' . $logo . '" width="50" height="50">';
            })
            ->addColumn('status', function ($row) {

                $current = $row->status == 1 ? 'Active' : 'Inactive';

                return '
                    <select class="form-control form-control-sm statusDropdown text-center" 
                            data-id="' . $row->id . '" 
                            style="width:80px; padding:2px; font-size:15px;">
                        <option value="' . $row->status . '" selected>' . $current . '</option>
                        <option value="' . ($row->status == 1 ? 0 : 1) . '">' . ($row->status == 1 ? 'Inactive' : 'Active') . '</option>
                    </select>
                ';
            })
            ->addColumn('action', function ($row) {
                $edit = '<a href="' . route('brand.edit', $row->id) . '" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>';

                $delete = '<a href="' . route('brand.delete', $row->id) . '" 
                                    onclick="return confirm(\'Are you sure?\')" 
                                    class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>';

                return $edit . ' ' . $delete;
            })
            ->rawColumns(['logo', 'status', 'action'])
            ->make(true);
    }

    // Create Form
    public function create()
    {
        return view('admin.brand.create');
    }

    // Store Brand
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|unique:brands,name',
            'logo'          => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'slug'          => 'required',
            'description'   => 'required',
        ]);

        $logoUrl = null;
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/brand'), $imageName);
            $logoUrl = 'uploads/brand/' . $imageName;
        }

        Brand::create([
            'name'          => $request->name,
            'slug'          => Str::slug($request->name),
            'description'   => $request->description,
            'status'        => $request->status,
            'logo'          => $logoUrl
        ]);

        return redirect()->route('brand.index')->with('success', 'Brand Created Successfully');
    }

    // Edit Form
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    // Update Brand
    public function update(Request $request)
    {
        $brand = Brand::findOrFail($request->id);

        $request->validate([
            'name' => 'required|unique:brands,name,' . $brand->id,
        ]);

        $logoUrl = $brand->logo;

        if ($request->hasFile('logo')) {
            if ($brand->logo && file_exists(public_path($brand->logo))) {
                unlink(public_path($brand->logo));
            }

            $image = $request->file('logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/brand'), $imageName);
            $logoUrl = 'uploads/brand/' . $imageName;
        }

        $brand->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'status' => $request->status,
            'logo' => $logoUrl
        ]);

        return redirect()->route('brand.index')->with('success', 'Brand Updated Successfully');
    }

    // Delete Brand
    public function delete($id)
    {
        $brand = Brand::findOrFail($id);

        $brand->delete();

        return redirect()->route('brand.index')
            ->with('success', 'Category deleted successfully');
    }
}
