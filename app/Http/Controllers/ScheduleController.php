<?php

namespace App\Http\Controllers;

use App\Schedule;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

    public function getSchedule($name, $week, $type = 'g'){
        $rowName = ($type == 'g') ? 'groups.name' : 'teachers.name' ;
        $schedule = DB::table('schedule')
            ->select('teachers.name AS teacher', 'groups.name AS group', 'schedule.subgroup', 'schedule.week', 'schedule.day', 'schedule.lesson_number')
            ->join('groups', 'schedule.group_id', '=', 'groups.id')
            ->join('teachers','schedule.teacher_id', '=', 'teachers.id')
            ->where($rowName,'=', $name)
            ->where('schedule.week', $week)->orderBy('lesson_number')
            ->get()->groupBy('day');
        return Response::json(array('data' => $schedule));
    }
    public function getTeacherSchedule($teacherName, $week){
        $schedule = DB::table('schedule')
            ->join('groups', 'schedule.group_id', '=', 'groups.id')
            ->join('teachers','schedule.teacher_id', '=', 'teachers.id')
            ->where('teachers.name','=', $teacherName)
            ->where('schedule.week', $week)
            ->get();
        return Response::json(array('data' => $schedule));
    }
    public function getAll(){
        $teachers = DB::table('teachers')
            ->select('name', 'id');
        $auditories = DB::table('auditories')
            ->select('name', 'id' );
        $schedule = DB::table('groups')
            ->select( 'name', 'id')
            ->unionAll($teachers)
            ->unionAll($auditories)
            ->orderBy('name', 'asc')
            ->get();
        return Response::json(array('data' => $schedule));

    }
    public function destroy(Schedule $schedule)
    {
        //
    }
}
