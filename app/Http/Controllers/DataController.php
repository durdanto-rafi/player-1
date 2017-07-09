<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogSchoolContentsHistoryStudent;
use App\Models\LogSchoolContentsHistoryStudentEvent;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $histories = LogSchoolContentsHistoryStudent::with('events')->where('student_number', 590)->orderBy('history_upload_datetime','DESC')->get();
        //dd($data->toArray());
        foreach ($histories as $key => $history) 
        {
            $previousEvent = null;

            
            foreach ($history->events as $key => $event) 
            {
                // Remove initial value
                if($event->progress_time == 0 && $event->position == 0 && $event->event_action_number == 0)
                {
                    unset($history->events[$key]);
                }

                // Pause
                if($previousEvent!=null)
                {
                    if($event->position == $previousEvent->position && $event->speed_number == 0)
                    {
                        unset($history->events[$key]);
                    }
                }
                $previousEvent = $event;
            }

            dd($history->events->toArray());

            // Rewind 


            // No action
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
