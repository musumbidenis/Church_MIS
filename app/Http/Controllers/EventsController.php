<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.NewEvent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate the form input fields
        $validator = Validator::make($request->all(), [
            'eventName' => 'required',
            'eventDate' => 'required',
            'location' => 'required',
            'eventDescription' => 'required',
        ]);

        //Alert the user of the input error
        if ($validator->fails()) {
            toastr()->error($validator->messages()->all()[0], 'Oops!');
            return back();
        } else {
            //Save the input data to database
            $event = new Event();
            $event->eventName = $request->eventName;
            $event->eventDate = Carbon::createFromFormat('m/d/Y', $request->eventDate)->format('Y-m-d');
            $event->location = $request->location;
            $event->description = $request->eventDescription;

            $event->save();

            //Success message
            toastr()->success('Event added successfully!', 'Success!');

            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
