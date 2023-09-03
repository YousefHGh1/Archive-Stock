<?php

namespace App\Http\Controllers;

use App\Models\Court;
use Illuminate\Http\Request;

class CourtController extends Controller
{

    public function index()
    {
    }
    //  عمل اخطار
    public function create()
    {
        return view('court.create');
    }

    public function store(Request $request)
    {
    }

    // طلب تنفيذي
    public function court_order()
    {
        // $court = Court::find($id);
        return view('court.court_order');
    }

    // قبل الحجز
    // 1 دفع كامل
    public function B_all_amount()
    {
        return view('court.before_reservation_order.all_amount');
    }

    // 2 قسط
    public function B_part_amount()
    {

        return view('court.before_reservation_order.part_amount');
    }


    // أنواع الحجز
    // 1 منع سفر
    public function travel_ban()
    {

        return view('court.reservation_order.travel_ban');
    }
    // 2 حجز راتب
    public function salary_reservation()
    {

        return view('court.reservation_order.salary_reservation');
    }
    // 3 أمر حبس
    public function detention_order()
    {

        return view('court.reservation_order.detention_order');
    }

    // بعد الحجز
    // 1 دفع كامل
    public function A_all_amount()
    {
        return view('court.after_reservation_order.all_amount');
    }
    // 2 قسط

    public function A_part_amount()
    {

        return view('court.after_reservation_order.part_amount');
    }
    // 3 فك أمر حبس
    public function end_detention()
    {

        return view('court.after_reservation_order.end_detention');
    }

    public function edit()
    {
        //
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy()
    {
        //
    }
}
