<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use Yajra\DataTables\Facades\DataTables;

class AdController extends Controller
{
    public function index()
    {
        return view('admin.ads.index');
    }

    public function getData()
    {
        return DataTables::of(Ad::latest())
            ->addIndexColumn()

            ->addColumn('thumbnail', function ($row) {
                $img = $row->thumbnail ? asset($row->thumbnail) : 'https://via.placeholder.com/50';
                return '<img src="' . $img . '" width="60">';
            })

            ->addColumn('status', function ($row) {
                return $row->status == 1
                    ? '<span class="badge badge-success">Active</span>'
                    : '<span class="badge badge-danger">Inactive</span>';
            })

            ->addColumn('action', function ($row) {
                return '
                <a href="' . route('ads.edit', $row->id) . '" class="btn btn-primary btn-sm">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="' . route('ads.delete', $row->id) . '" onclick="return confirm(\'Are you sure?\')" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i>
                </a>
            ';
            })

            ->rawColumns(['thumbnail', 'status', 'action'])
            ->make(true);
    }

    // =============================
    // Create Page
    // =============================
    public function create()
    {
        return view('admin.ads.create');
    }

    // =============================
    // Store Ad
    // =============================
    public function store(Request $request)
    {

        $request->validate([
            'title'     => 'required|unique:ads,title',
            'thumbnail' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $imageUrl = null;

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/ads'), $imageName);

            $imageUrl = 'uploads/ads/' . $imageName;
        }

        Ad::create([
            'title'     => $request->title,
            'status'    => $request->status,
            'thumbnail' => $imageUrl,
        ]);

        return redirect()->route('ads.index')
            ->with('success', 'Ad created successfully');
    }

    // =============================
    // Edit Page
    // =============================
    public function edit($id)
    {
        $ad = Ad::findOrFail($id);

        return view('admin.ads.edit', compact('ad'));
    }

    // =============================
    // Update Ad
    // =============================
    public function update(Request $request)
    {

        $ad = Ad::findOrFail($request->id);

        $request->validate([
            'title' => 'required|unique:ads,title,' . $ad->id,
        ]);

        if ($request->hasFile('thumbnail')) {

            // old image delete
            if ($ad->thumbnail && file_exists(public_path($ad->thumbnail))) {
                unlink(public_path($ad->thumbnail));
            }

            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/ads'), $imageName);

            $imageUrl = 'uploads/ads/' . $imageName;
        } else {

            $imageUrl = $ad->thumbnail;
        }

        $ad->update([
            'title'     => $request->title,
            'status'    => $request->status,
            'thumbnail' => $imageUrl,
        ]);

        return redirect()->route('ads.index')
            ->with('success', 'Ad updated successfully');
    }

    // =============================
    // Delete Ad
    // =============================
    public function delete($id)
    {
        $ad = Ad::findOrFail($id);
        $ad->delete();

        return redirect()->route('ads.index')->with('success', 'Ad deleted successfully');
    }
}
