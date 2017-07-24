<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

use App\Visitor;

class VisitorsController extends Controller{

    public function showAllpost(Request $request){
        if ($request->select == 's1'){
        $visitorsOrd = Visitor::where('count', '>=' , $request->count )->orderBy('created_at', 'asc')->get();
        }
        if ($request->select == 's2'){
            $visitorsOrd = Visitor::where('count', '>=' , $request->count )->orderBy('Data', 'asc')->get();
        }
        if ($request->select == 's3'){
            $visitorsOrd = Visitor::where('count', '>=' , $request->count )->orderBy('count', 'asc')->get();
        }
        return view('form')->with('visitors',$visitorsOrd);
    }


    public function update(Request $request)
    {
        Visitor::create(
            [
                'name'=> $request->name,
                'Data'=> $request->Data,
                'place'=> $request->Place,
                'count'=> $request->count
            ]
        );
        return redirect('/visitors/'.$request->id);
    }

    public function store(Request $request, $id)
    {
        $name = $request->input('name');
        $flight = visitor::find($id);
//Обновляем ФИО
        $flight->name = $name;
        $flight->save();
//Обновляем дату рождения
        $Data = $request->input('Data');
        $flight->Data = $Data;
//Обновляем адрес
        $Place = $request->input('Place');
        $flight->Place = $Place;
//Обновляем количество проданных веников
        $count = $request->input('count');
        $flight->count = $count;
//Сохраняем БД
        $flight->save();
        return redirect('/visitors/'.$id);
    }

    public function destroy($id)
    {
        $vis = visitor::find($id);
        $vis->delete();
        return redirect('/visitors');
    }


    public function showAll(){
        $visitors = Visitor::all();
        return view('form')->with('visitors',$visitors);
    }

    public function show($id){
        $visitor = visitor::find($id);
        return view('formShowVisitor')->with('visitor',$visitor);
    }
    public function create(){
        return view('formcreate');
    }

    public function edit($id){
        $visitor = visitor::find($id);

        if ($visitor != null)
        {

            return view('formedit')->with('visitor',$visitor);
        }
        else {
            return redirect('/visitors/');
        }


       }

}

?>
