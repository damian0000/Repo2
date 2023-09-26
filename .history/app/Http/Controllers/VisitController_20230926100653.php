<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Repositories\VisitRepository;


class VistController extends Controller
{
    public function index(VisitRepository $visitRepo)
    {
        $visit=$visitRepo->getAll();

        return view('Visits.list', ["visitList"=>$visit,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Usługi u podopiecznych"]);
    }
}
