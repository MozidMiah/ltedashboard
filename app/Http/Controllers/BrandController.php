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
            ->addColumn('logo', function($row){
                $logo = $row->logo ? asset($row->logo) : 'https://via.placeholder.com/50';
                return '<img src="'.$logo.'" width="50" height="50">';
            })
            ->addColumn('status', function($row){
                return $row->status ? '<span class="badge badge-success">Active</span>' :
                                     '<span class="badge badge-danger">Inactive</span>';
            })
            ->addColumn('action', function($row){
                $editUrl = route('brand.edit', $row->id);
                $deleteUrl = route('brand.delete', $row->id);

                return '<a href="'.$editUrl.'" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
                        <button data-url="'.$deleteUrl.'" class="btn btn-sm btn-danger deleteBtn"><i class="fas fa-trash"></i></button>';
            })
            ->rawColumns(['logo','status','action'])
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
        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/brand'), $imageName);
            $logoUrl = 'uploads/brand/'.$imageName;
        }

        Brand::create([
            'name'          => $request->name,
            'slug'          => Str::slug($request->name),
            'description'   => $request->description,
            'status'        => $request->status,
            'logo'          => $logoUrl
        ]);

        return redirect()->route('brand.index')->with('success','Brand Created Successfully');
    }

    // Edit Form
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    // Update Brand
    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:brands,name,'.$brand->id,
            'logo'          => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'slug'          => 'required',
            'description'   => 'required',
        ]);

        $logoUrl = $brand->logo;

        if($request->hasFile('logo')){
            if($brand->logo && file_exists(public_path($brand->logo))){
                unlink(public_path($brand->logo));
            }

            $image = $request->file('logo');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/brand'), $imageName);
            $logoUrl = 'uploads/brand/'.$imageName;
        }

        $brand->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'status' => $request->status,
            'logo' => $logoUrl
        ]);

        return redirect()->route('brand.index')->with('success','Brand Updated Successfully');
    }

    // Delete Brand
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        if($brand->logo && file_exists(public_path($brand->logo))){
            unlink(public_path($brand->logo));
        }

        $brand->delete();

        return response()->json(['status'=>'success']);
    }
}