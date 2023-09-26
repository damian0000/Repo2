<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssistantService;
use App\Repositories\AssistantServiceRepository;


class AssistantServiceController extends Controller
{
    public function index(AssistantServiceRepository $AssServiceRepo)
    {
        $AssService=$AssServiceRepo->getAll();

        return view('AssistantServices.list', ["assserviceList"=>$AssService,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Usługi u podopiecznych"]);
    }
}