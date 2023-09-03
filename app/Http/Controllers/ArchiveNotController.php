<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\archiveNot;
use App\Models\Type;
use App\Models\User;
use App\Notifications\CreatearchiveNot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class ArchiveNotController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:archive', ['only' => ['index',  'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index()
    {
        // $archiveNot = DB::table('archive_nots')->get();
        $user = User::all();
        $archive = Archive::all();
        $type = Type::all();
        $archiveNot = archiveNot::all();
        return view('sendNotification.archiveindex', compact('user', 'archive', 'archiveNot', 'type'));
    }

    public function create()
    {
        //

        // $next_num = archiveNot::max('id') + 1;

        // if (!$next_num) {
        //     $next_num = 1;
        // }

        $user = User::all();
        $archive = Archive::all();
        $archiveNot = archiveNot::all();
        $type = Type::all();
        return view('sendNotification.archiveNot', compact('user', 'archive', 'archiveNot', 'type'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'sender' => 'required',
            'type_id' => 'required',
            'title' => 'required',
            'reciver' => 'required',
            'files.*' => 'required|mimes:jpg,jpeg,png,pdf,doc,docx,xlsx,ods'
        ]);
        if ($request->hasfile('files')) {
            foreach ($request->file('files') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/filearchiveNot/', $name);
                $data[] = $name;
            }
        }

        $archiveNot = new archiveNot();

        $archiveNot->id = $request->id;
        $archiveNot->sender = Auth::user()->employee_name;
        $archiveNot->type_id = $request->type_id;
        $archiveNot->title = $request->title;

        // تحديث الكود ليستقبل مجموعة من المستلمين
        $recipients = $request->input('reciver');
        $recipients = is_array($recipients) ? $recipients : [$recipients];
        $recipientNames = User::whereIn('name', $recipients)->pluck('employee_name')->implode(", ");
        $archiveNot->reciver = $recipientNames;

        $archiveNot->files = json_encode($data);

        $archiveNot->description = $request->description;
        // dd($archiveNot);
        // ************************{متغيرات الاشعارات}*********************************
        $request = $archiveNot->save();

        $user_create = auth()->user()->employee_name;

        // إرسال الإشعار إلى جميع المستلمين
        Notification::send(User::whereIn('name', $recipients)->get(), new CreatearchiveNot($archiveNot->id, $archiveNot->files, $archiveNot->title, $user_create));

        // تحديث متغير $archiveNot ليتعامل مع القيمة الجديدة لحقل المستلمين
        $archiveNot['reciver'] = json_encode($recipients);
        // ****************************************************************************
        if ($request === TRUE) {
            return redirect()->back()->with('success', 'تمت الارسال بنجاح!');
        } else {
            return redirect('archiveNot.create')->with('warning', '  تحقق من صحة البيانات!');
        }
    }

    // public function show($id)
    // {
    //     // استرداد الإشعار المخزن بناءً على المعرف الممرر
    //     $archiveNot = archiveNot::find($id);

    //     // إذا تم العثور على الإشعار، قم بتحديث الوقت لتصبح الرسالة مقروءة
    //     // if ($archiveNot) {
    //         $recivers = json_decode($archiveNot->reciver);
    //         $getId = DB::table('notifications')->where('data->archiveNot_id',  $id)->pluck('id');
    //         DB::table('notifications')->whereIn('id', $getId)->update(['read_at' => now()]);
    //     // }

    //     // قم بإرجاع العرض المختص بالإشعار
    //     return view('sendNotification.archiveshow', compact('archiveNot'));
    // }

 


    public function show($id)
    {
        $archiveNot = ArchiveNot::find($id);
        $recipients = json_decode($archiveNot->reciver);

        if ($archiveNot->allRead()) {
            // $archiveNot->delete();
            $getId = DB::table('notifications')->where('data->archiveNot_id',  $id)->pluck('id');
            DB::table('notifications')->whereIn('id', $getId)->delete();
            return redirect()->route('archiveNot.index')->with('success', 'تم حذف الإشعار بنجاح');
        } else {
            $unreadRecipients = $archiveNot->unreadRecipients();
            return view('sendNotification.archiveshow', compact('archiveNot', 'recipients', 'unreadRecipients'));
        }
    }


    public function archiveshow($id)
    {
        //
        $archiveNot = archiveNot::find($id);
        $type = Type::all();

        return view('sendNotification.archiveshow1', compact('archiveNot', 'type',))->with('archiveNot', $archiveNot);;
    }

    public function destroy($id)
    {
        //
        archiveNot::destroy($id);
        return redirect('sendNotification/archiveNot')->with('error', 'تمت الحذف بنجاح!');
    }

    public function searchdate(Request $request)
    {
        $user = User::all();
        $archive = Archive::all();
        $type = Type::all();
        // قم بتحميل التاريخ الأول والتاريخ الثاني من النموذج
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // قم بتنفيذ الاستعلام والحصول على نتيجة البحث
        $archiveNot = archiveNot::whereBetween('created_at', [$startDate, $endDate])->get();

        // قم بعرض نتيجة البحث
        return view(
            'sendNotification.archiveindex',
            compact('archiveNot', 'type', 'archive', 'user')
        )
            ->with('success', 'تمت عملية البحث !');
    }
}
