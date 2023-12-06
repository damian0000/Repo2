<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Company;
use App\Models\Role;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;

class AssistantController extends BaseController
{
    public function index(UserRepository $userRepo)
    {
        $users=$userRepo->getAllAsistants();
        return $users->toJson();
    }

}
