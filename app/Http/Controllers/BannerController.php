<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BannerController extends Controller
{
    // ================= INDEX =================
    public function index()
    {
        return view('admin.banner.index');
    }

    // ================= DATATABLE =================
    public function getData(Request $request)
    {
        $banners = Banner::latest()->get();

        return DataTables::of($banners)
            ->addIndexColumn()

            ->addColumn('thumbnail', function ($row) {
                $img = $row->thumbnail ? asset($row->thumbnail) : 'https://via.placeholder.com/50';
                return '<img src="' . $img . '" width="60" height="50">';
            })

            ->addColumn('status', function ($row) {
                $current = $row->status == 1 ? 'Active' : 'Inactive';
                return '
        <select class="form-control form-control-sm statusDropdown" data-id="' . $row->id . '" style="width:90px;">
            <option value="1" ' . ($row->status == 1 ? 'selected' : '') . '>Active</option>
            <option value="0" ' . ($row->status == 0 ? 'selected' : '') . '>Inactive</option>
        </select>
    ';
            })

            ->addColumn('action', function ($row) {

                $edit = '<a href="' . route('banner.edit', $row->id) . '" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i>
                         </a>';

                $delete = '<a href="' . route('banner.delete', $row->id) . '" 
                                onclick="return confirm(\'Are you sure?\')" 
                                class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                           </a>';

                return $edit . ' ' . $delete;
            })

            ->rawColumns(['thumbnail', 'status', 'action'])
            ->make(true);
    }

    // ================= CREATE =================
    public function create()
    {
        return view('admin.banner.create');
    }

    // ================= STORE =================
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|unique:banners,title',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/banner'), $imageName);
            $imagePath = 'uploads/banner/' . $imageName;
        }

        Banner::create([
            'title'     => $request->title,
            'thumbnail' => $imagePath,
            'status'    => $request->status ?? 1,
        ]);

        return redirect()->route('banner.index')->with('success', 'Banner Created Successfully');
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }

    // ================= UPDATE =================
    public function update(Request $request)
    {
        $banner = Banner::findOrFail($request->id);

        $banner->title = $request->banner;
        $banner->status = $request->status;

        $thumbnailUrl = $banner->thumbnail;

        // old image delete optional
        if ($request->hasFile('thumbnail')) {
            // old image delete korar jonno
            if ($banner->thumbnail && file_exists(public_path($banner->thumbnail))) {
                unlink(public_path($banner->thumbnail));
            }

            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/banner'), $imageName);
            $thumbnailUrl = 'uploads/brand/' . $imageName;
        }

        $banner->update([
            // 'title' => $request->title,
            'status' => $request->status,
            'thumbnail' => $thumbnailUrl
        ]);

        return redirect()->route('banner.index')->with('message', 'Banner updated successfully!');
    }

    public function status($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->status = $banner->status == 1 ? 0 : 1;
        $banner->save();

        return response()->json(['success' => 'Status updated successfully', 'status' => $banner->status]);
    }

    // ================= DELETE =================
    public function delete($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        return redirect()->route('banner.index')->with('success', 'Banner deleted successfully');
    }
}
