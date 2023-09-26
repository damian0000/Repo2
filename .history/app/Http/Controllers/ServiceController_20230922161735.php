<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(ServiceRepository $serviceRepo)
    {
        $service=$serviceRepo->getAll();

        return view('Service.list', ["serviceList"=>$service,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Lista usług"]);
    }
}
