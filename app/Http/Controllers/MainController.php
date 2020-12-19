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

}
