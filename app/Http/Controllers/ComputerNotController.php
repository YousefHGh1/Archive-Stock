<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\computerNot;
use App\Models\User;
use App\Notifications\CreatecomputerNot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ComputerNotController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:computer', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index()
    {
        //
        $user = User::all();
        $computer = Computer::all();
        $computerNot = computerNot::all();
        return view('sendNotification.computerindex', compact('user', 'computer', 'computerNot'));
    }

    public function create()
    {
        //
        $user = User::all();
        $computer = Computer::all();
        $computerNot = computerNot::all();
        return view('sendNotification.computerNot', compact('user', 'computer', 'computerNot'));
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

        $computerNot = new computerNot();

        $computerNot->id = $request->id;
        $computerNot->sender = Auth::user()->name;

        $recipients = $request->input('reciver');
        $recipients = is_array($recipients) ? $recipients : [$recipients];
        $recipientNames = User::whereIn('name', $recipients)->pluck('employee_name')->implode(", ");
        $computerNot->reciver = $recipientNames;

        $file = $request->file;
        $file1 = time() . '.' . $file->getClientoriginalExtension();
        $request->file->move('filecomputerNot', $file1);
        $computerNot->file = $file1;
        $computerNot->description = $request->description;
        // ************************{متغيرات الاشعارات}*********************************
        $users = User::whereIn('name', $recipients)->get();
        $user_create = auth()->user()->name;
        Notification::send($users, new CreatecomputerNot($computerNot->id,$computerNot->file, $computerNot->description, $user_create));
        // ****************************************************************************

        if ($computerNot->save()) {
            return redirect('sendNotification/computerNot')->with('success', 'تمت الارسال بنجاح!');
        } else {
            return redirect('computerNot.create')->with('warning', '  تحقق من صحة البيانات!');
        }
    }

    public function show($id)
    {
        //
        $computerNot = computerNot::find($id);

        return view('sendNotification.computershow', compact('computerNot'))->with('computerNot', $computerNot);
    }

    public function destroy($id)
    {
        //
        computerNot::destroy($id);
        return redirect('sendNotification/computerNot')->with('error', 'تمت الحذف بنجاح!');
    }
}