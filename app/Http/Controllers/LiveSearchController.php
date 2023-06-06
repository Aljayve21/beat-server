<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LiveSearchController extends Controller
{
    function index()
    {
        return view('livesearch');
    }

    function action(Request $request)
    {
        if($request->ajax())
        {
         $output = '';
            $query = $request->get('query');
         if ($query != '') {
             $data = DB::table('patients')
             ->Where('name', 'like', '%'.$query.'%')
             ->orWhere('age', 'like', '%'.$query.'%')
             ->orWhere('gender', 'like', '%'.$query.'%')
             ->orWhere('condition', 'like', '%'.$query.'%')
             ->orWhere('heart_rate', 'like', '%'.$query.'%')
             ->orWhere('respiratory_pressure', 'like', '%'.$query.'%')
             ->orWhere('blood_pressure', 'like', '%'.$query.'%')
             ->orWhere('oxygen_level', 'like', '%'.$query.'%')
             ->orWhere('temperature', 'like', '%'.$query.'%')
             ->orderBy('id', 'desc')
             ->get();
         } else {
             $data = DB::table('patients')
             ->orderBy('id', 'desc')
             ->get();
         }

         $total_rs = $data->count();
             if($total_rs > 0){
                foreach($data as $rs)
                {
                    $output .= '
                    <tr>
                    <td>'.$rs->name.'</td>
                    <td>'.$rs->age.'</td>
                    <td>'.$rs->gender.'</td>
                    <td>'.$rs->condition.'</td>
                    <td>'.$rs->heart_rate.'</td>
                    <td>'.$rs->respiratory_pressure.'</td>
                    <td>'.$rs->blood_pressure.'</td>
                    <td>'.$rs->oxygen_level.'</td>
                    <td>'.$rs->temperature.'</td>
                    
                    </tr>
                    ';
                    
                }
             } else {
                $output = '
                <tr>
                <td align="center" colspan="9">No Data Found</td>
                </tr>
                ';
             }

             $data = array(
                'table_data' => $output,
                'total_data' => $total_rs
             );
             
             echo json_encode($data);
    }
}

}
