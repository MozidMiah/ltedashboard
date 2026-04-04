<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use Yajra\DataTables\Facades\DataTables;

class AdController extends Controller
{
    // =============================
    // Ads List Page
    // =============================
    public function index()
    {
        return view('admin.ads.index');
    }

    // =============================
    // Yajra DataTable Data
    // =============================
    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $ads = Ad::latest();

            return DataTables::of($ads)
                ->addIndexColumn()
                ->addColumn('thumbnail', function ($row) {
                    $img = $row->thumbnail ? asset($row->thumbnail) : 'https://via.placeholder.com/50';
                    return '<img src="' . $img . '" width="60" height="50">';
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
                    $edit = '<a href="' . route('ads.edit', $row->id) . '" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                             </a>';
                    $delete = '<a href="' . route('ads.delete', $row->id) . '" 
                                    onclick="return confirm(\'Are you sure?\')" 
                                    class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                               </a>';
                    return $edit . ' ' . $delete;
                })
                ->rawColumns(['thumbnail', 'status', 'action'])
                ->make(true);
        }
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

        if ($ad->thumbnail && file_exists(public_path($ad->thumbnail))) {
            unlink(public_path($ad->thumbnail));
        }

        $ad->delete();

        return redirect()->route('ads.index')
            ->with('success', 'Ad deleted successfully');
    }
}
