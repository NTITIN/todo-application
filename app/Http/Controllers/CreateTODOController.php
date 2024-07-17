<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DailyTask;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Session;

class CreateTODOController extends Controller
{
    public function index()
    {
        $user = User::all();

        return view('auth.create_todo')->with('user', $user);
    }

    public function getEmail($id)
    {
        $user = User::find($id);

        if ($user) {
            return response()->json(['email' => $user->email]);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }

    public function insert_task(Request $request)
    {
        
        $dailytask = DailyTask::create([
            'user_id' => $request->user_id,
            'user_name' => $request->username,
            'task_description' => $request->task_description,
            'user_email_id' => $request->emplpoyee_emailid,
        ]);

        return view('home')->with('success', 'Invitation send successfully.');

    }

    public function invite_employee_index(Request $request)
    {
        $user = User::all();

        return view('auth.invite')->with('user', $user);
    }

    public function getData()
    {
            $tasks = DailyTask::with('user')->select(['id', 'user_id', 'task_description', 'user_email_id']);
            
            return Datatables::of($tasks)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
    
                            return $btn;
                    })
                    ->editColumn('user_name', function ($task) {
                        return $task->user ? $task->user->name : ''; // Handle null case gracefully
                    })
                    ->rawColumns(['action','user_name'])
                    ->make(true);
        
    
    }



}
