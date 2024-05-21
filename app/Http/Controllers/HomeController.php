<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ResponseApiTrait;
use App\Models\User;

class HomeController extends Controller
{
    use ResponseApiTrait;
    public function indexUsersApi(Request $req){
        $users=User::paginate(10);
        return $this->success( "Users Data",
                $users,200 );
    }
}
