<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Size;
use App\Models\Unit;
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
        $products = Product::with('category', 'subcategory', 'brand')->latest();

        return DataTables::of($products)
            ->addIndexColumn()

            ->addColumn('category_name', function ($row) {
                return $row->category->name;
            })
            ->addColumn('selling_price', function ($row) {
                return $row->selling_price;
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

            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.product.create', [
            'categories'        => Category::all(),
            'subcategories'     => Subcategory::all(),
            'brands'            => Brand::all(),
            'colors'            => Color::all(),
            'units'             => Unit::all(),
            'sizes'             => Size::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required',
            'category_id'       => 'required',
            'buying_price'      => 'required|numeric',
            'selling_price'     => 'required|numeric',
            'stock_qty'         => 'required|integer',
            'sku'               => 'required|unique:products,sku',
        ]);

        // Image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/products'), $name);
            $imagePath = 'uploads/products/' . $name;
        }

        // Slug generate
        $slug = Str::slug($request->name);
        $count = Product::where('slug', 'LIKE', "$slug%")->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        Product::create([
            'name'              => $request->name,
            'slug'              => $slug,
            'sku'               => $request->sku,

            'short_description' => $request->short_description,
            'description'       => $request->description,

            'category_id'       => $request->category_id,
            'subcategory_id'    => $request->subcategory_id,
            'brand_id'          => $request->brand_id,

            'color_id'          => $request->color_id,
            'unit_id'           => $request->unit_id,
            'size_id'           => $request->size_id,

            'buying_price'      => $request->buying_price,
            'selling_price'     => $request->selling_price,
            'discount_price'    => $request->discount_price,

            'stock_qty'         => $request->stock_qty,
            'min_qty'           => $request->min_qty,
        ]);

        return redirect()->route('product.index')->with('success', 'Product Created Successfully');
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

            'buying_price'      => $request->buying_price,
            'selling_price'     => $request->selling_price,
            'discount_price'    => $request->discount_price,

            'stock_qty'         => $request->stock_qty,
            'min_qty'           => $request->min_qty,
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
