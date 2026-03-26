<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    // =============================
    // SubCategory List Page
    // =============================
    public function index()
    {
        return view('admin.subcategory.index');
    }

    // =============================
    // Yajra DataTable Data
    // =============================
    public function getData(Request $request)
    {
        if ($request->ajax()) {

            $subcategories = Subcategory::with('category')->latest();

            return DataTables::of($subcategories)
                ->addIndexColumn()

                ->addColumn('image', function ($row) {
                    $image = $row->image ? asset($row->image) : asset('images/default.png');
                    return '<img src="' . $image . '" width="50">';
                })

                ->addColumn('category', function ($row) {
                    return $row->category ? $row->category->name : '-';
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
                    $edit = '<a href="' . route('subcategory.edit', $row->id) . '" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i>
                            </a>';
                    $delete = '<a href="' . route('subcategory.delete', $row->id) . '" 
                                onclick="return confirm(\'Are you sure?\')" 
                                class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                                </a>';
                    return $edit . ' ' . $delete;
                })

                ->rawColumns(['image', 'status', 'action'])
                ->make(true);
        }
    }

    // =============================
    // Create Page
    // =============================
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategory.create', compact('categories'));
    }

    // =============================
    // Store SubCategory
    // =============================
    public function store(Request $request)
    {
        $request->validate([
            'category_id'       => 'required',
            'name'              => 'required|unique:subcategories,name',
            'slug'              => 'required|unique:subcategories,slug',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $imageUrl = null;
        if ($request->hasFile('image')) {
            $imageUrl = getImageUrl($request->image, 'uploads/subcategories/');
        }

        Subcategory::create([
            'category_id'       => $request->category_id,
            'name'              => $request->name,
            'slug'              => Str::slug($request->name),
            'description'       => $request->description,
            'status'            => $request->status ?? 1,
            'image'             => $imageUrl,
        ]);

        return redirect()->route('subcategory.index')
            ->with('success', 'SubCategory created successfully');
    }

    // =============================
    // Edit Page
    // =============================
    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::all();
        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }

    // =============================
    // Update SubCategory
    // =============================
    public function update(Request $request)
    {
        $subcategory = Subcategory::findOrFail($request->id);

        $request->validate([
            'category_id'       => 'required',
            'name'              => 'required|unique:subcategories,name,' . $subcategory->id,
            'slug'              => 'required|unique:subcategories,slug,' . $subcategory->id,
            'image'             => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('image')) {
            $imageUrl = getImageUrl($request->image, 'uploads/subcategories/');
        } else {
            $imageUrl = $subcategory->image;
        }

        $subcategory->update([
            'category_id'       => $request->category_id,
            'name'              => $request->name,
            'slug'              => Str::slug($request->name),
            'description'       => $request->description,
            'status'            => $request->status ?? 1,
            'image'             => $imageUrl,
        ]);

        return redirect()->route('subcategory.index')
            ->with('success', 'SubCategory updated successfully');
    }

    // =============================
    // Delete SubCategory
    // =============================
    public function delete($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();

        return redirect()->route('subcategory.index')
            ->with('success', 'SubCategory deleted successfully');
    }
}
