<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Works;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function getAllUser()
    {
        return User::all();
    }
    public function loginUser(Request $request)
    {
        $status = 0;
        $userInfo=null;
        $articles = User::where('user_name', $request->input('user_name'))->get();
        foreach($articles as $item){
            if($item->password === $request->input('password')){
                $status ++ ;
                $userInfo = $item;
            }else{
                $status = 0 ;
            }
        }
        if($status > 0){
            return response()->json(['message' => 'success', 'status' => $status,'userInfo' => $userInfo, 'Login Success' ]);
        }else if ($status === 0){
            return response()->json(['message' => 'failed', 'status' => $status, 'Invalid value' ]);
        }

    }
    public function addUser(Request $request)
    {
        // return $request->input('user_name');
        $user = new User();
        $user->user_name = $request->input('user_name');
        $user->password = $request->input('password');
        $user->created_at = date("Y-m-d");
        $user->save();
        return response()->json(['message' => 'success', 'status' => 200 ,'user' => $user ]);
    }
    public function getAllWorks()
    {
        return Works::all();
    }
    public function addWorkNew(Request $request)
    {
        // return $request->input('user_name');
        $work = new Works();
        $work->work_do_time = $request->input('work_do_time');
        $work->work_name = $request->input('work_name');
        $work->created_at = date("Y-m-d");
        $work->work_description = $request->input('work_description');
        $work->work_time_point = $request->input('work_time_point');
        $work->work_status = $request->input('work_status');
        $work->work_type = $request->input('work_type');
        $work->work_category = $request->input('work_category');
        $work->save();
        return response()->json(['message' => 'success', 'status' => 200 ,'user' => $work ]);
    }
    // public function workSearchIdUpdate(Request $request)
    // {
    //     $work = Works::where('work_id', $request->input('work_id'))->get();
    //     foreach($work as $item){
    //         $item->work_status = 'done';
    //         $item->save();
    //     }
    //     return response()->json(['message' => 'success', 'status' => 200 ,'user' => $work ]);
    // }
    public function workSearchIdUpdate(Request $request)
    {
        $work = Works::where('work_id', $request->input('work_id'))->get();
        foreach($work as $item){
            $item->work_status = 'done';
            $item->save();
        }
        return response()->json(['message' => 'success', 'status' => 200 ,'user' => $work ]);
    }
}
