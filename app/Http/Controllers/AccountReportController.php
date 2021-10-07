<?php

namespace App\Http\Controllers;

use App\AccountClass;
use App\BankAccount;
use App\GlAccount;
use App\JournalDetail;
use Illuminate\Http\Request;
use PDF;
class AccountReportController extends Controller
{
    public function cashflow()
    {
        $cash_gl_ids = BankAccount::where('type', 3)->get()->pluck('account_gl_id');
        $journal_ids = JournalDetail::whereIn('gl_id', $cash_gl_ids)->get()->pluck('journal_id');
        $journal_details = JournalDetail::whereIn('journal_id', $journal_ids)->with('gl_info', 'gl_info.groupDetails', 'gl_info.groupDetails.classDetails')->get();
        $inflow = [];
        $outflow = [];
        foreach($journal_details as $journal){
            if(!in_array($journal->gl_id, $cash_gl_ids->toArray())){
                if($journal->amount > 0){
                    $outflow[$journal->gl_info->groupDetails->class_id][] = $journal;
                    if(!array_key_exists('sum', $outflow[$journal->gl_info->groupDetails->class_id])){
                        $outflow[$journal->gl_info->groupDetails->class_id]['sum'] = 0;
                    }
                    $outflow[$journal->gl_info->groupDetails->class_id]['sum'] += $journal->amount;
                }

                if($journal->amount < 0){
                    $inflow[$journal->gl_info->groupDetails->class_id][] = $journal;
                    if(!array_key_exists('sum', $inflow[$journal->gl_info->groupDetails->class_id])){
                        $inflow[$journal->gl_info->groupDetails->class_id]['sum'] = 0;
                    }
                    $inflow[$journal->gl_info->groupDetails->class_id]['sum'] += $journal->amount;
                }
            }
        }

        // return [$inflow, $outflow];
        $data=['data'=>AccountClass::all(), 'inflow' => $inflow, 'outflow' => $outflow];
        return view('admin.accounts.report.cash_flow', $data);
        // $pdf = PDF::loadView('admin.accounts.report.cash_flow', $data)->setPaper('a4');
        return $pdf->stream();
    }
    public function balancesheet()
    {
        $gl_details = JournalDetail::with('gl_info', 'gl_info.groupDetails', 'gl_info.groupDetails.classDetails')->wherehas('gl_info.groupDetails.classDetails', function($q){
            $q->whereIn('type', ['Assets', 'Liabilities']);
        })->get();

        $filtered_data = [];
        foreach($gl_details as $gl_detail){

            $classType = $gl_detail->gl_info->groupDetails->classDetails->type;
            $className = $gl_detail->gl_info->groupDetails->classDetails->name;
            $glName = $gl_detail->gl_info->name;

            // $filtered_data[$classType] = [];
            // $filtered_data[$classType][$className] = [];
            $filtered_data[$classType][$className][$glName][] = $gl_detail->amount;

            if(!array_key_exists('sum', $filtered_data[$classType][$className])){
                $filtered_data[$classType][$className]['sum'] = 0;
            }
            $filtered_data[$classType][$className]['sum'] += $gl_detail->amount;
        }
        // $gl_ids = array_values(array_unique($gl_ids->toArray()));
        // dd($gl_ids);

        // return $filtered_data;
        $data=['data'=> $filtered_data];
        return view('admin.accounts.report.balance_sheet', $data);
        $pdf = PDF::loadView('admin.accounts.report.balance_sheet',[])->setPaper('a4');
        return $pdf->stream();

    }
}
