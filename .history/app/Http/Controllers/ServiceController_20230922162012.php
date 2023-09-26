<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Repositories\ServiceRepository;

class ServiceController extends Controller
{
    public function index(ServiceRepository $serviceRepo)
    {
        $service=$serviceRepo->getAll();

        return view('Services.list', ["serviceList"=>$service,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Lista usług"]);
    }
}
