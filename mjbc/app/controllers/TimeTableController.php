<?php

class TimeTableController extends BaseController
{
  	public function getAddTimeTable()
  	{
        $seminar =Seminar::groupBy('code_no')->get();
        $days=array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
	    return View::make('timetable.add',array('response'=>$seminar,'days' => $days,));
    }

    public function postAddTimeTable()
    {
        $name        = Input::get('s_name');
        $lecturer    = Input::get('lecturer');
        $venue       = Input::get('venue');
        $strart_date = Input::get('sdate');
        $strart_date = date("Y-m-d", strtotime($strart_date ) );
        $end_date    = Input::get('edate');
        $end_date    = date("Y-m-d", strtotime($end_date ) );
        // dd($end_date);
        $start_time  = Input::get('stime');
        $end_time    = Input::get('etime');
    	$days        = Input::get('days');
        $sdays       = json_encode($days);
        $substring   = substr($sdays, 1);
        $substring   = substr($substring, 0,-1);
        $checkexist  = TimeTable::whereseminar_id($name)->wherestart_date($strart_date)->whereend_date($end_date)->first();
        if($checkexist)
        {
            $response='This record is already exit';
            // return Response::json($response);
            return Redirect::to('timetablelist')->with('message',$response);
        }
 
    	$timetable  = new TimeTable();
        $timetable ->seminar_id        = $name;
        $timetable ->venue             = $venue;
        $timetable ->lecturer          = $lecturer;
        $timetable ->start_date        = $strart_date;
        $timetable ->end_date          = $end_date;
        $timetable ->start_time        = $start_time;
        $timetable ->end_time          = $end_time;
        $timetable ->days              = $substring;

        
        $result   = $timetable->save();

        $message="success.";
    
    	return Redirect::to('timetablelist')->with('message',$message);
    }
    public function postAddTimeTable11()
    {
        $name        = Input::get('s_name');
        $lecturer    = Input::get('lecturer');
        $venue       = Input::get('venue');
        $strart_date = Input::get('sdate');
        $strart_date = date("Y-m-d", strtotime($strart_date ) );
        $end_date    = Input::get('edate');
        $end_date    = date("Y-m-d", strtotime($end_date ) );
        $start_time  = Input::get('stime');
        $end_time    = Input::get('etime');
        $s_days      = Input::get('days');
        // dd($s_days);
        $checkexist = TimeTable::whereseminar_id($name)->wherestart_date($strart_date)->whereend_date($end_date)->wherevenue($venue)->wherelecturer($lecturer)->first();
        if($checkexist)
        {
            $response='This record is already exit';
            // return Response::json($response);
            return Redirect::to('timetablelist')->with('message',$response);
        }
 
        $timetable  = new TimeTable();
        $timetable ->seminar_id        = $name;
        $timetable ->venue             = $venue;
        $timetable ->lecturer          = $lecturer;
        $timetable ->start_date        = $strart_date;
        $timetable ->end_date          = $end_date;
        $timetable ->start_time        = $start_time;
        $timetable ->end_time          = $end_time;
        $result    = $timetable->save();
        // $timetable ->days              = $substring;
        $max_id = TimeTable::max('id');
        if($s_days){
            $i=0;
            foreach ($s_days as $day) {
                
                    $obj_timetable= TimeTable::find($max_id);
                    $obj_timetable->days=$s_days[$i];
                    $obj_timetable->update();
                    $i++;
                
                
            }
        }
        // $count_days=count($s_days);
        // if($count_days > 0){
        //     for($i=0 ; $i < $count_days; $i++){
        //         $obj_timetable= TimeTable::find($max_id);
        //         $obj_timetable->days=$s_days[$i];
        //         $obj_timetable->update();
        //     }
        // }
        

        $message="success.";
    
        return Redirect::to('timetablelist')->with('message',$message);
    }
    public function showTimeTableList()
    {
        $response     = $obj_timetable = TimeTable::orderBy('id','desc')->get();
        // return Response::json($response);
        $alltimetable = TimeTable::all();
        $totalCount   = count($alltimetable);
        $i=0;
        foreach($response as $timetable)
        {
            $seminarname = Seminar::where('id','=',$timetable['seminar_id'])->pluck('name');

            $response[$i]['id']              = $timetable['id'];
            $response[$i]['seminar_id']      = $seminarname;
            $i++;
        }

    	return View::make('timetable.list',array('response'=>$response,'totalCount'=>$totalCount));
    }

    public function getEditTimeTable($id)
    {
        $days=array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
            $obj_timetable = TimeTable::find($id);
           if(count($obj_timetable) == 0)
           {
            return Redirect::to('timetablelist');
           }
           $timetable['id']                       = $id;
           $timetable['seminar_id']               = $obj_timetable->seminar_id;
           $timetable['start_date']               = $obj_timetable->start_date;
           $timetable['end_date']                 = $obj_timetable->end_date;
           $timetable['start_time']               = $obj_timetable->start_time;
           $timetable['end_time']                 = $obj_timetable->end_time;
           $timetable['venue']                    = $obj_timetable->venue;
            $timetabledays=explode(',', $obj_timetable->days);
            $timetabledays=str_replace('"', '', $timetabledays);
            $timetable['days']                     = $timetabledays;
           $timetable['lecturer']                 = $obj_timetable->lecturer;

           $seminar=Seminar::groupBy('code_no')->get();
           $response['timetable']  = $timetable;
           $response['seminar']    = $seminar;
           // return Response::json($response['timetable']);
        
        return View::make('timetable.edit',array('response'=>$response, 'days'=> $days));
    }

    public function postEditTimeTable($id)
    {
        $name        = Input::get('s_name');
        $lecturer    = Input::get('lecturer');
        $venue       = Input::get('venue');
        $start_date  = Input::get('sdate');
        $start_date  = date("Y-m-d", strtotime($start_date ) );
        $end_date    = Input::get('edate');
        $end_date    = date("Y-m-d", strtotime($end_date ) );
        $start_time  = Input::get('stime');
        $end_time    = Input::get('etime');
        $days        = Input::get('days');
        // dd($days);
        $sdays       = json_encode($days);
        $substring   = substr($sdays, 1);
        $substring   = substr($substring, 0,-1);
       
        $checksamewithother  = TimeTable::where('id','!=',$id)->whereseminar_id($name)->wherestart_date($start_date)->whereend_date($end_date)->wherestart_time($start_time)->whereend_time($end_time)->first();
        if($checksamewithother)
        {
            $response ='This record is already exit';
            return Redirect::to('timetablelist')->with('message',$response);
        }

        $toupdate      = TimeTable::whereid($id)->find($id);
        if($toupdate)
        {
            $affectedRows1 = TimeTable::where('id','=',$id)->update(array('seminar_id'=>$name,
                                                                            'start_date'=>$start_date,
                                                                            'end_date'=>$end_date,
                                                                            'start_time'=>$start_time,
                                                                            'end_time'=>$end_time,
                                                                            'venue'=>$venue,
                                                                            'lecturer'=>$lecturer,
                                                                            'days'=>$substring
                                                                          ));
            $message = "success.";
            return Redirect::to('timetablelist')->with('message',$message);    
        }
    }

    public function getDeleteTimeTable($id)
    {
    	$affectedRows1 = TimeTable::where('id','=',$id)->delete();
        $response="Successfully delete one record.";
        return Redirect::to('timetablelist')->with('message',$response);
    }
}