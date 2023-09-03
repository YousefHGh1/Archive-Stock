<?php

namespace App\Http\Controllers;

use App\Models\Jibaya;
use App\Models\jibayaNot;
use App\Models\User;
use App\Notifications\CreatejibayaNot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class JibayaNotController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:jibaya', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index()
    {
        //
        $user = User::all();
        $jibaya = Jibaya::all();
        $jibayaNot = jibayaNot::all();
        return view('sendNotification.jibayaindex', compact('user', 'jibaya', 'jibayaNot'));
    }

    public function create()
    {
        //
        $user = User::all();
        $jibaya = Jibaya::all();
        $jibayaNot = jibayaNot::all();
        return view('sendNotification.jibayaNot', compact('user', 'jibaya', 'jibayaNot'));
    }


    public function store(Request $request)
    {
        //
        $request->validate([
            'sender' => 'required',
            'reciver' => 'required',
            'file' => 'required',
            'description' => 'required',
        ]);

        $jibayaNot = new jibayaNot();

        $jibayaNot->id = $request->id;
        $jibayaNot->sender = Auth::user()->name;


        $recipients = $request->input('reciver');
        $recipients = is_array($recipients) ? $recipients : [$recipients];
        $recipientNames = User::whereIn('name', $recipients)->pluck('employee_name')->implode(", ");
        $jibayaNot->reciver = $recipientNames;

        $file = $request->file;
        $file1 = time() . '.' . $file->getClientoriginalExtension();
        $request->file->move('filejibayaNot', $file1);
        $jibayaNot->file = $file1;
        $jibayaNot->description = $request->description;
        // ************************{متغيرات الاشعارات}*********************************
        $users = User::whereIn('name', $recipients)->get();
        $user_create = auth()->user()->name;
        Notification::send($users, new CreatejibayaNot($jibayaNot->id, $jibayaNot->file, $jibayaNot->description, $user_create));
        // ****************************************************************************
        if ($jibayaNot->save()) {
            return redirect('sendNotification/jibayaNot')->with('success', 'تمت الارسال بنجاح!');
        } else {
            return redirect('jibayaNot.create')->with('warning', '  تحقق من صحة البيانات!');
        }
    }

    public function show($id)
    {
        //
        $jibayaNot = jibayaNot::find($id);

        return view('sendNotification.jibayashow', compact('jibayaNot'))->with('jibayaNot', $jibayaNot);
    }

    public function destroy($id)
    {
        //
        jibayaNot::destroy($id);
        return redirect('sendNotification/jibayaNot')->with('error', 'تمت الحذف بنجاح!');
    }
}
