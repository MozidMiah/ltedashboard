<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportMessage;
use Yajra\DataTables\Facades\DataTables;

class SupportMessageController extends Controller
{
    public function index()
    {
        return view('admin.support.index');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {

            $data = SupportMessage::latest();

            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {
                    return '
                        <button class="btn btn-sm btn-danger deleteBtn" data-id="' . $row->id . '">
                            Delete
                        </button>
                    ';
                })

                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        SupportMessage::create($request->all());

        return response()->json(['success' => 'Message Sent']);
    }

    public function destroy($id)
    {
        SupportMessage::find($id)->delete();

        return response()->json(['success' => 'Deleted']);
    }
}
