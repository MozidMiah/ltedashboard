<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Yajra\DataTables\Facades\DataTables;

class BannerController extends Controller
{
    public function index()
    {
        return view('admin.banner.index');
    }

    public function data()
    {
        $data = Banner::latest();

        return DataTables::of($data)
            ->addIndexColumn()

            ->addColumn('thumbnail', function ($row) {
                return '<img src="/uploads/banner/'.$row->thumbnail.'" width="70">';
            })

            ->addColumn('status', function ($row) {
                $checked = $row->status ? 'checked' : '';
                return '<input type="checkbox" class="statusToggle" data-id="'.$row->id.'" '.$checked.'>';
            })

            ->addColumn('action', function ($row) {
                return '
                <a href="'.route('banner.edit',$row->id).'" class="btn btn-sm btn-primary">Edit</a>
                <button class="btn btn-sm btn-danger deleteBtn" data-id="'.$row->id.'">Delete</button>
                ';
            })

            ->rawColumns(['thumbnail','status','action'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'thumbnail'=>'required|image'
        ]);

        $image = $request->file('thumbnail');
        $name = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('uploads/banner'), $name);

        Banner::create([
            'title'=>$request->title,
            'thumbnail'=>$name,
            'status'=>1
        ]);

        return redirect()->route('banner.index')->with('success','Banner Added');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        if($request->hasFile('thumbnail')){
            $image = $request->file('thumbnail');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/banner'), $name);

            $banner->thumbnail = $name;
        }

        $banner->title = $request->title;
        $banner->save();

        return redirect()->route('banner.index')->with('success','Updated');
    }

    public function delete($id)
    {
        Banner::findOrFail($id)->delete();
        return response()->json(['success'=>true]);
    }

    public function status(Request $request)
    {
        $banner = Banner::find($request->id);
        $banner->status = $request->status;
        $banner->save();

        return response()->json(['success'=>true]);
    }
}