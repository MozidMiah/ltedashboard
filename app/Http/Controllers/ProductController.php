<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }

    public function getData()
    {
        $products = Product::with('category','subcategory','brand')->latest();

        return DataTables::of($products)
            ->addIndexColumn()

            ->addColumn('category_name', function ($row) {
                return $row->category->name;
            })
            ->addColumn('image', function ($row) {
                return '<img src="' . asset($row->image) . '" width="50">';
            })

            ->addColumn('status', function ($row) {
                return $row->status
                    ? '<span class="badge badge-success">Active</span>'
                    : '<span class="badge badge-danger">Inactive</span>';
            })

            ->addColumn('action', function ($row) {
                return '
                    <a href="' . route('product.edit', $row->id) . '" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="' . route('product.delete', $row->id) . '" 
                        onclick="return confirm(\'Are you sure?\')" 
                        class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                    </a>
                ';
            })

            ->rawColumns(['image', 'status', 'action'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.product.create', [
            'categories'        => Category::all(),
            'subcategories'     => Subcategory::all(),
            'brands'            => Brand::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'category_id'   => 'required|integer',
            'subcategory_id' => 'required|integer',
            'brand_id'      => 'required|integer',
            'price'         => 'required|numeric',
            'quantity'      => 'required|integer',
            'image'         => 'required|image|mimes:jpg,jpeg,png,gif',
        ]);

        // Handle Image Upload
        $imagePath = null;
        if ($file = $request->file('image')) {
            $name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/products'), $name);
            $imagePath = 'uploads/products/' . $name;
        }

        // Generate unique slug
        $slug = Str::slug($request->name);
        $count = Product::where('slug', 'LIKE', "$slug%")->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        // Create Product
        Product::create([
            'name'           => $request->name,
            'slug'           => $slug,
            'category_id'    => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'brand_id'       => $request->brand_id,
            'price'          => $request->price,
            'quantity'       => $request->quantity,
            'image'          => $imagePath,
            'discount_price'    => $request->discount_price,
            'status'         => $request->status ?? 1,
        ]);

        return redirect()->route('product.index')->with('success', 'Product created successfully!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.product.edit', [
            'product'           => $product,
            'categories'        => Category::all(),
            'subcategories'     => Subcategory::all(),
            'brands'            => Brand::all(),
        ]);
    }

    public function update(Request $request)
    {
        $product = Product::findOrFail($request->id);

        $request->validate([
            'name'      => 'required',
            'price'     => 'required'
        ]);

        if ($request->hasFile('image')) {
            // old image delete
            if (file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            $file = $request->file('image');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/products'), $name);

            $product->image = 'uploads/products/' . $name;
        }

        $product->update([
            'name'              => $request->name,
            'slug'              => Str::slug($request->name),
            'category_id'       => $request->category_id,
            'subcategory_id'    => $request->subcategory_id,
            'brand_id'          => $request->brand_id,
            'price'             => $request->price,
            'quantity'          => $request->quantity,
            'discount_price'       => $request->discount_price,
            'status'            => $request->status ?? 1,
        ]);

        return redirect()->route('product.index')->with('success', 'Product Updated');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('product.index')
            ->with('success', 'Product deleted successfully');
    }
}
