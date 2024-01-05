<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\InternshipDataTable;
use App\Http\Controllers\Controller;
use App\Models\Internship;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentInternshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(InternshipDataTable $dataTable)
    {
        return  $dataTable->render('student.internship.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.internship.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'company' => ['required', 'max:200'],
            'country' => ['required', 'max:200'],
            'county' => ['required', 'max:200'],
            'address' => ['required'],
            'website' => ['nullable', 'url'],
            'duration' => ['required']
        ]);


        $internship = new Internship();

        $internship->company = $request->company;
        $internship->country = $request->country;
        $internship->county = $request->county;
        $internship->address = $request->address;
        $internship->website = $request->website;
        $internship->duration = $request->duration;
        $internship->user_id = Auth::user()->id;


        $supervisors = Supervisor::all();

        // Randomly select a supervisor
        $randomSupervisor = $supervisors->random();

        // Assign the supervisor to the internship
        $internship->supervisor_id = $randomSupervisor->id;

        $internship->save();

        toastr('Added Successfully!', 'success');

        return redirect()->route('internships.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
