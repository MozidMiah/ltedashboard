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

    public function getData(Request $request)
    {
        if ($request->ajax()) {

            $ads = Ad::latest();

            return DataTables::of($ads)

                ->addIndexColumn()

                ->addColumn('thumbnail', function ($row) {
                    $img = $row->image
                        ? asset($row->image)
                        : 'https://via.placeholder.com/50';

                    return '<img src="' . $img . '" width="50">';
                })

                ->addColumn('status', function ($row) {

                    $current = $row->status == 1 ? 'Active' : 'Inactive';

                    return '
                    <select class="form-control form-control-sm statusDropdown text-center" 
                            data-id="' . $row->id . '" 
                            style="width:80px;">
                        <option value="' . $row->status . '" selected>' . $current . '</option>
                        <option value="' . ($row->status == 1 ? 0 : 1) . '">' . ($row->status == 1 ? 'Inactive' : 'Active') . '</option>
                    </select>
                    ';
                })

                ->addColumn('action', function ($row) {

                    $edit = '<a href="' . route('ads.edit', $row->id) . '" 
                                class="btn btn-primary btn-sm">
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

    public function create()
    {
        return view('admin.ads.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'thumbnail' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $imageUrl = null;

        if ($request->hasFile('thumbnail')) {
            $imageUrl = getImageUrl($request->thumbnail, 'uploads/ads/');
        }

        Ad::create([
            'title'  => $request->title,
            'status' => $request->status,
            'thumbnail'  => $imageUrl,
        ]);

        return redirect()->route('ads.index')
            ->with('success', 'Ad created successfully');
    }

    public function edit($id)
    {
        $ad = Ad::findOrFail($id);

        return view('admin.ads.edit', compact('ad'));
    }

    public function update(Request $request)
    {
        $ad = Ad::findOrFail($request->id);

        $request->validate([
            'title' => 'required',
        ]);

        if ($request->hasFile('thumbnail')) {
            $imageUrl = getImageUrl($request->thumbnail, 'uploads/ads/');
        } else {
            $imageUrl = $ad->thumbnail;
        }

        $ad->update([
            'title'  => $request->title,
            'status' => $request->status,
            'thumbnail'  => $imageUrl,
        ]);

        return redirect()->route('ads.index')
            ->with('success', 'Ad updated successfully');
    }

    public function delete($id)
    {
        $ad = Ad::findOrFail($id);

        $ad->delete();

        return redirect()->route('ads.index')
            ->with('success', 'Ad deleted successfully');
    }
}
