<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\AttendanceMetaCategory;
use App\AttendanceMeta;
use App\Attendance;
use App\Member;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class AttendanceMetaController extends Controller
{
    protected $page_title = "Attendance Metadata";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cacheddata = Cache::get('meta_id');

        if (empty($cacheddata)) {
            return redirect()->back()->with('error', 'Start Attendance');
        }
        extract($cacheddata);
        $attendanceMeta = AttendanceMeta::where('meta_id', $cacheddata['meta_id'])->first();

        $members = Member::orderBy('last_name', 'desc')->get();

        $page_title = $this->page_title;
        $heading = "Manage Members Attendance";
        return view('attendance.index', compact('attendanceMeta', 'members', 'heading', 'page_title'));
    }

    public function manage()
    {
        $page_title = $this->page_title;
        $activeAttd = Cache::get('meta_id');
        $heading = 'Start Attendance';
        $attendances = AttendanceMeta::all();
        // return $attendances;
        return view('attendance.manage', compact('activeAttd', 'attendances', 'page_title', 'heading'));
    }

    public function create(Request $request)
    {
        $metaCategories = AttendanceMetaCategory::all();
        $page_title = $this->page_title;
        $heading = 'Start Attendance';
        return view('attendance.start', compact('metaCategories',  'heading', 'page_title'));
    }


    public function show($meta_id)
    {
        $cacheddata = Cache::get('attendanceMeta');

        if (empty($cacheddata)) {
            return redirect()->back()->with('error', 'Start Attendance');
        }

        $attendanceMeta = AttendanceMeta::where('meta_id', $meta_id)->first();

        $members = Member::all();

        $page_title = $this->page_title;
        $heading = "Manage Members Attendance";
        return view('attendance.index', compact('attendanceMeta', 'members', 'heading', 'page_title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'category_id' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'category_id' => 1, // temporal: $request->category_id,
            'meta_id' => (string) Str::uuid(),
            'start_time' => $this->getCurrentTime(),
            'active' => 1,
            'user_id' => 1 //temporal data
        ];

        if (empty(Cache::get('meta_id'))) {
            AttendanceMeta::create($data);
            Cache::forever('attendanceMeta', ['active' => $data['active'], 'meta_id' => $data['meta_id']]);
            return redirect()->route('attendance.show', $data['meta_id'])->with('success', 'attendance started');
        }

        return redirect()->back()->with('error', 'attendance for today already started');
    }

    public function endAttendance()
    {
        $cache = Cache::get('attendanceMeta');
        $att = AttendanceMeta::where('meta_id', $cache['meta_id'])->first();
        // return $att->start_time;
        $data = [
            'end_time' => $this->getCurrentTime(),
            'duration' => Carbon::create($att->start_time)->diffInMinutes(),
            'active' => false
        ];

        // dd($data);
        $att->update($data);

        Cache::forget('meta_id');
        return redirect()->back()->with('success', 'Attendance Successfully Ended');
    }

    private function getCurrentTime()
    {
        return Carbon::now();
    }

    /**
     * manageCategory
     *
     * @return void
     */
    public function manageCategory()
    {
        $page_title = 'Manage Attendance Categories';
        $heading = $page_title;

        $categories = AttendanceMetaCategory::all();

        return view('attendance.category.create', compact('categories', 'page_title', 'heading'));
    }


    /**
     * createCategoryPage
     *
     * @return void
     */
    public function createCategoryPage()
    {

        $page_title = 'Attendance Category';
        $heading = 'Create Attendance Category';
        return view('attendance.category.create', compact('page_title', 'heading'));
    }

    /**
     * storeCategory
     *
     * @param  mixed $request
     * @return void
     */
    public function storeCategory(Request $request)
    {
        $request->validate(['name' => 'required|unique:attendance_meta_categories']);
        AttendanceMetaCategory::create(['name' => $request->name]);

        return redirect()->back()->with('success', 'New Category Successfully Added');
    }


    /**
     * editCategoryPage
     *
     * @param  mixed $id
     * @return void
     */
    public function editCategoryPage($id)
    {
        // return $metaCategory;
        $category = AttendanceMetaCategory::find($id);
        $page_title = 'Edit Attendance Category - ' . $category->name;
        $heading = $page_title;
        $categories = AttendanceMetaCategory::all();


        return view('attendance.category.edit', compact('category', 'categories', 'page_title', 'heading'));
    }


    /**
     * updateCategory
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function updateCategory(Request $request, $id)
    {
        $request->validate(['name' => 'required']);

        $category = AttendanceMetaCategory::find($id);
        $category->name = $request->name;
        $category->update();

        return redirect()->route('attendance.category.manage')->with('success', 'Update Successful');
    }

    public function destroyCategory($id)
    {
        $category = AttendanceMetaCategory::find($id);
        $category->delete();
        return redirect()->back()->with('success', 'Delete Successful');
    }
}
