<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Repositories\VisitRepository;


class VistController extends Controller
{
    public function index(AssistantServiceRepository $assServiceRepo)
    {
        $assService=$assServiceRepo->getAll();

        return view('AssistantServices.list', ["assserviceList"=>$assService,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Usługi u podopiecznych"]);
    }
}
