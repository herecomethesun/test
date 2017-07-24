<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class VisitorsController extends Controller{

    public function show(){
        if (view()->exists('default.form')) {
            return view('default.form')->withTitle('Hello world');
        }
        abort(404);
    }


}

?>
