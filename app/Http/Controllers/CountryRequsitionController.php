<?php

namespace App\Http\Controllers;

use App\Country;
use App\CountryRequsition;
use App\StudentRequsition;
use Illuminate\Http\Request;

class CountryRequsitionController extends Controller
{

    public function create()
    {
        return view('admin.student.country_requsition.add');
    }

    public function consellorview()
    {
       return view('admin.student.country_requsition.consellor_view');
    }

    public function ajaxconsellor($id)
    {
        $country = Country::find($id);
        $html =
        '<tr>
            <th>SL</th>
            <th>Particulars</th>
            <th>Amount</th>
            <th>Remark</th>
        </tr>';
        $key = 1;
        $requsitions = StudentRequsition::where('status',1)->where('parent_id', null)->get();
        {
            foreach($requsitions as $requsition){
                $rq = CountryRequsition::where('country_id',$id)->where('requsition_id',$requsition->id)->first();
                $rq_amount = $rq->amount ?? "";
                $rq_remark = $rq->remark ?? "";
                $html .= '<tr>
                        <td class="text-center">'.$key++.'</td>
                        <td style="font-weight: bold">' .$requsition->name.'</td>
                        <td><input type="text" disabled class="form-control" name="amount[]" value="'.$rq_amount.'"><input type="hidden" class="form-control" name="requsition[]" value="'.$requsition->id .'"></td>
                        <td><input type="text" disabled class="form-control" name="remark[]" value="'.$rq_remark .'"></td>
                    </tr>';
            if($requsition->subrequsitions != null){
                foreach($requsition->subrequsitions as $subreq){
                $rqs = CountryRequsition::where('country_id',$id)->where('requsition_id',$subreq->id)->first();
                $rqs_amount = $subreq->amount ?? "";
                $rqs_remark = $subreq->remark ?? "";
                $html .= '<tr>
                            <td></td>
                            <td>'. $subreq->name .'</td>
                            <td><input type="text" disabled class="form-control" name="amount[]" value="'.$rqs_amount.'"><input type="hidden" class="form-control" name="requsition[]" value="'.$subreq->id .'"></td>
                            <td><input type="text" disabled class="form-control" name="remark[]" value="'.$rqs_remark.'"></td>
                        </tr>';
                }
            }
            $total_price = CountryRequsition::where('country_id',$id)->sum('amount') ?? "";


        }
        $html .='<tr>
                        <td></td>
                        <td style="font-weight: bold">TOTAL</td>
                        <td style="font-weight: bold"> Tk -'.$total_price.'</td>
                        <td></td>

                    </tr>';

        return response()->json($html);
    }
    }

    public function ajax($id)
    {
        $country = Country::find($id);
        $html =
        '<tr>
            <th>SL</th>
            <th>Particulars</th>
            <th>Amount</th>
            <th>Remark</th>
        </tr>';
        $key = 1;
        $requsitions = StudentRequsition::where('status',1)->where('parent_id', null)->get();
        {
            foreach($requsitions as $requsition){
                $rq = CountryRequsition::where('country_id',$id)->where('requsition_id',$requsition->id)->first();
                $rq_amount = $rq->amount ?? "";
                $rq_remark = $rq->remark ?? "";
                $html .= '<tr>
                        <td class="text-center">'.$key++.'</td>
                        <td style="font-weight: bold">' .$requsition->name.'</td>
                        <td><input type="text" class="form-control" name="amount[]" value="'.$rq_amount.'"><input type="hidden" class="form-control" name="requsition[]" value="'.$requsition->id .'"></td>
                        <td><input type="text" class="form-control" name="remark[]" value="'.$rq_remark .'"></td>
                    </tr>';
            if($requsition->subrequsitions != null){
                foreach($requsition->subrequsitions as $subreq){
                $rqs = CountryRequsition::where('country_id',$id)->where('requsition_id',$subreq->id)->first();
                $rqs_amount = $subreq->amount ?? "";
                $rqs_remark = $subreq->remark ?? "";
                $html .= '<tr>
                            <td></td>
                            <td>'. $subreq->name .'</td>
                            <td><input type="text" class="form-control" name="amount[]" value="'.$rqs_amount.'"><input type="hidden" class="form-control" name="requsition[]" value="'.$subreq->id .'"></td>
                            <td><input type="text" class="form-control" name="remark[]" value="'.$rqs_remark.'"></td>
                        </tr>';
                }
            }

        }
        $html .='<tr>
        <td colspan="4"><button type="submit" class="btn btn-primary btn-block">Update</button></td>
    </tr>';
        return response()->json($html);

    }


    }
    public function store(Request $request)
    {
        $count = count($request->requsition);
        for ($i=0; $i < $count; $i++) {
            $check = CountryRequsition::where('requsition_id',$request->requsition[$i])->where('country_id',$request->country_id)->first();
            if(empty($check)){
                $rq = new CountryRequsition;
                $rq->country_id =$request->country_id;
                $rq->requsition_id =$request->requsition[$i];
                $rq->amount =$request->amount[$i];
                $rq->remark =$request->remark[$i];
                $rq->save();
            }else{
                $rqs = CountryRequsition::where('requsition_id',$request->requsition[$i])->where('country_id',$request->country_id)->first();
                $rqs->country_id =$request->country_id;
                $rqs->requsition_id =$request->requsition[$i];
                $rqs->amount =$request->amount[$i];
                $rqs->remark =$request->remark[$i];
                $rqs->save();
            }
        }
        return redirect()->back();

    }
}
