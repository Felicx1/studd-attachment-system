<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\DailyReportDataTable;
use App\Http\Controllers\Controller;
use App\Models\DailyReport;
use App\Models\Internship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DailyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DailyReportDataTable $dataTable)
    {
        return $dataTable->render('student.daily-report.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.daily-report.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descrption_of_work_done' => ['required']
        ]);

        if (Internship::where('user_id', Auth::user()->id)->exists()) {
            $report = new DailyReport();

            $report->descrption_of_work_done = $request->descrption_of_work_done;
            $report->user_id =  Auth::user()->id;
            $report->save();


            toastr('Report Added Successfully', 'success');

            return redirect()->route('daily-reports.index');
        } else {

            toastr('No internship record found', 'error');

            return redirect()->route('internships.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dailyReport = DailyReport::findOrFail($id);
        return view('student.daily-report.edit', compact('dailyReport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dailyReport = DailyReport::find($id);

        $dailyReport->descrption_of_work_done = $request->descrption_of_work_done;

        // Check if the user has the 'internal_supervisor' role
        if (Gate::allows('internal_supervisor')) {
            $request->validate([
                'descrption_of_work_done' => ['required'],
                'remarks_or_comments' => ['required', 'max:200'],
                'sign_or_innitials' => ['required']
            ]);

            $dailyReport->remarks_or_comments = $request->remarks_or_comments;
            $dailyReport->sign_or_innitials = $request->sign_or_innitials;
        } else {
            $request->validate([
                'descrption_of_work_done' => ['required']
            ]);
        }

        $dailyReport->save();

        toastr('Updated Successfully', 'success');

        return redirect()->route('daily-reports.index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
