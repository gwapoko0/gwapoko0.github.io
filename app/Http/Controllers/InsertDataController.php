<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\insertDataModel;

class InsertDataController extends Controller
{
    public function insert(Request $request){
        $data = new insertDataModel;
       
        $data->name = $request->input('fname');
        $data->badge = $request->input('badge');
        $data->area = $request->input('area');
        $data->supervisor = $request->input('supv');
        $data->pts = $request->input('pts');
        $data->trans_date = $request->input('date');
        $data->remarks = $request->input('remarks');
        $data->trans_by = $request->input('trans_by');

        $data->save();
        echo json_encode($data);
    }
}
