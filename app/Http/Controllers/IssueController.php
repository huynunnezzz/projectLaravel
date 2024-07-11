<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = Issue::paginate(10);
        return view('issues.index',compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $computers = Computer::all();
        return view('issues.create',compact('computers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $computer_id = $request->input('computer_id');
        $reported_by = $request->input('reported_by');
        $reported_date = $request->input('reported_date');
        $description = $request->input('description');
        $urgency = $request->input('urgency');
        $status = $request->input('status');

        $result = DB::table('issues')->insert([
            'computer_id' => $computer_id,
            'reported_by' => $reported_by,
            'reported_date' => $reported_date,
            'description' => $description,
            'urgency' => $urgency,
            'status' => $status,
        ]);
        if($result){
            return redirect()->route('issues.index')->with('success','Thêm thành công');
        }else{
            return redirect()->route('issues.index')->with('error','Thêm thất bại');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Issue $issue)
    {
        return view('issues.show',compact('issue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Issue $issue)
    {
        $computer = Computer::find($issue->computer_id);
        return view('issues.edit',compact('issue','computer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Issue $issue)
    {
        $reported_by = $request->input('reported_by');
        $reported_date = $request->input('reported_date');
        $description = $request->input('description');
        $urgency = $request->input('urgency');
        $status = $request->input('status');

        $result = $issue->update([
            'reported_by' => $reported_by,
            'reported_date' => $reported_date,
            'description' => $description,
            'urgency' => $urgency,
            'status' => $status,
        ]);
        if($result){
            return redirect()->route('issues.index')->with('success','Cập nhật thành công');
        }else{
            return redirect()->route('issues.index')->with('error','Cập nhật thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Issue $issue)
    {
        $result = $issue->delete();
        if($result){
            return redirect()->route('issues.index')->with('success','Xóa thành công');
        }else{
            return redirect()->route('issues.index')->with('error','Xóa thất bại');
        }
    }
}
