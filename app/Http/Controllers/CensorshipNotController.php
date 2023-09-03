<?php

namespace App\Http\Controllers;

use App\Models\Censorship;
use App\Models\censorshipNot;
use App\Models\User;
use App\Notifications\CreatecensorshipNot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class CensorshipNotController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:censorship', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index()
    {
        $user = User::all();
        $censorship = Censorship::all();
        $censorshipNot = censorshipNot::all();
        return view('sendNotification.censorshipindex', compact('user', 'censorship', 'censorshipNot'));
    }

    public function create()
    {
        $user = User::all();
        $censorship =Censorship::all();
        $censorshipNot =censorshipNot::all();
        return view('sendNotification.censorshipNot',compact('user','censorship','censorshipNot'));

    }


    public function store(Request $request)
    {
        $request->validate([
            'sender' => 'required',
            'reciver' => 'required',
            'file' => 'required',
            'description' => 'required',
        ]);

        $censorshipNot= new censorshipNot();

        $censorshipNot->id = $request->id;
        $censorshipNot->sender=Auth::user()->name;


        $recipients = $request->input('reciver');
        $recipients = is_array($recipients) ? $recipients : [$recipients];
        $recipientNames = User::whereIn('name', $recipients)->pluck('employee_name')->implode(", ");
        $censorshipNot->reciver = $recipientNames;
        
        $file = $request->file;
        $file1 = time() . '.' . $file->getClientoriginalExtension();
        $request->file->move('filecensorshipNot', $file1);
        $censorshipNot->file = $file1;
        $censorshipNot->description=$request->description;

        // ************************{متغيرات الاشعارات}*********************************
        $users = User::whereIn('name', $recipients)->get();
        $user_create =auth()->user()->name;
        Notification::send($users , new CreatecensorshipNot($censorshipNot->id,$censorshipNot->file,$censorshipNot->description,$user_create));

        if ($censorshipNot->save()) {
            return redirect('sendNotification/censorshipNot')->with('success', 'تمت الارسال بنجاح!');
            }
            else{
                return redirect('censorshipNot.create')->with('warning', '  تحقق من صحة البيانات!');
            }

    }

    public function show($id)
    {
        $censorshipNot = censorshipNot::find($id);

        return view('sendNotification.censorshipshow', compact('censorshipNot'))->with('censorshipNot', $censorshipNot);
    }

    public function destroy($id)
    {
        //
        censorshipNot::destroy($id);
        return redirect('sendNotification/censorshipNot')->with('error', 'تمت الحذف بنجاح!');
    }
}