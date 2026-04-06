<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class CouponController extends Controller
{
    // =========================
    // Coupon List Page
    // =========================
    public function index()
    {
        return view('admin.coupon.index');
    }

    // =========================
    // DataTable AJAX
    // =========================
    public function getData(Request $request)
    {
        $coupons = Coupon::latest()->get();

        return DataTables::of($coupons)
            ->addIndexColumn()
            ->editColumn('start_at', function ($row) {
                return $row->start_at
                    ? Carbon::parse($row->start_at)->format('d M Y h:i A')
                    : '-';
            })
            ->editColumn('expire_at', function ($row) {
                return $row->expire_at
                    ? Carbon::parse($row->expire_at)->format('d M Y h:i A')
                    : '-';
            })
            ->addColumn('status', function ($row) {
                $current = $row->status == 1 ? 'Active' : 'Inactive';
                return '
                    <select class="form-control form-control-sm statusDropdown text-center" 
                            data-id="' . $row->id . '" 
                            style="width:90px; padding:2px; font-size:14px;">
                        <option value="' . $row->status . '" selected>' . $current . '</option>
                        <option value="' . ($row->status == 1 ? 0 : 1) . '">' . ($row->status == 1 ? 'Inactive' : 'Active') . '</option>
                    </select>
                ';
            })
            ->addColumn('action', function ($row) {
                $edit = '<a href="' . route('coupon.edit', $row->id) . '" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
                $delete = '<a href="' . route('coupon.delete', $row->id) . '" onclick="return confirm(\'Are you sure?\')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
                return $edit . ' ' . $delete;
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    // =========================
    // Create Coupon Page
    // =========================
    public function create()
    {
        return view('admin.coupon.create');
    }

    // =========================
    // Store Coupon
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'code'         => 'required|unique:coupons,code',
            'discount_type' => 'required',
            'discount'     => 'required|numeric|min:1',
            'min_amount'   => 'nullable|numeric',
            'user_limit'   => 'nullable|numeric',
            'max_discount' => 'nullable|numeric',
            'start_at'     => 'nullable|date',
            'expire_at'    => 'nullable|date|after_or_equal:start_at',
        ]);

        $start_at = $request->start_at ? Carbon::parse($request->start_at) : null;
        $expire_at = $request->expire_at ? Carbon::parse($request->expire_at) : null;

        Coupon::create([
            'code'          => $request->code,
            'discount_type' => $request->discount_type,
            'discount'      => $request->discount,
            'min_amount'    => $request->min_amount,
            'user_limit'    => $request->user_limit,
            'max_discount'  => $request->max_discount,
            'start_at'      => $start_at,
            'expire_at'     => $expire_at,
            'status'        => 1,
        ]);

        return redirect()->route('coupon.index')
            ->with('success', 'Coupon Added Successfully');
    }

    // =========================
    // Edit Coupon Page
    // =========================
    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupon.edit', compact('coupon'));
    }

    // =========================
    // Update Coupon
    // =========================
    public function update(Request $request, $id)
    {
        $coupon = Coupon::findOrFail($id);

        $request->validate([
            'code'         => 'required|unique:coupons,code,' . $coupon->id,
            'discount_type' => 'required',
            'discount'     => 'required|numeric|min:1',
            'min_amount'   => 'nullable|numeric',
            'user_limit'   => 'nullable|numeric',
            'max_discount' => 'nullable|numeric',
            'start_at'     => 'nullable|date',
            'expire_at'    => 'nullable|date|after_or_equal:start_at',
        ]);

        $coupon->update([
            'code'          => $request->code,
            'discount_type' => $request->discount_type,
            'discount'      => $request->discount,
            'min_amount'    => $request->min_amount,
            'user_limit'    => $request->user_limit,
            'max_discount'  => $request->max_discount,
            'start_at'      => $request->start_at ? Carbon::parse($request->start_at) : null,
            'expire_at'     => $request->expire_at ? Carbon::parse($request->expire_at) : null,
        ]);

        return redirect()->route('coupon.index')
            ->with('success', 'Coupon Updated Successfully');
    }

    // =========================
    // Change Status
    // =========================
    public function status($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->status = $coupon->status == 1 ? 0 : 1;
        $coupon->save();
        return redirect()->back();
    }

    // =========================
    // Delete Coupon
    // =========================
    public function delete($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        return redirect()->back()->with('success', 'Coupon Deleted Successfully');
    }
}
