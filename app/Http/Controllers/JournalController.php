<?php

namespace App\Http\Controllers;

use App\GlAccount;
use App\Journal;
use App\JournalDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Journal::all();
        return view('admin.accounts.gl.entry_all', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.accounts.gl.entry');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $total_debit = $request->totalldebit;
        $total_credit = $request->totallcredit;
        if (empty($total_debit) or empty($total_credit)) {

            return redirect()->back()->with(['messege'   =>  'Please Input Debit and Credit', 'alert-type' =>  'info']);
        }
        if ($total_debit == $total_credit) {
            $date = date('Y-m-d', strtotime($request->gl_date));
            $jurnal = new Journal;
            $jurnal->gl_date = $date;
            $jurnal->referance = $request->referance;
            $jurnal->src_referance = $request->src_referance;
            $jurnal->memo = $request->memo;
            $jurnal->created_by = Auth::id();
            $jurnal->save();
            $j_id = $jurnal->id;
            if ($j_id) {
                if ($request->account != null) {
                    $count = count($request->account);
                    for ($i = 0; $i < $count; $i++) {
                        if($request->debit[$i] || $request->credit[$i]){
                            $iteam = new JournalDetail;
                            $iteam->journal_id = $j_id;
                            $iteam->gl_id = $request->account[$i];
                            $iteam->txn_date = $date;
                            $iteam->memo = $request->desc[$i];
                            if($request->debit[$i]){
                                $iteam->amount = $request->debit[$i];
                            }else{
                                $iteam->amount = ($request->credit[$i]) * (-1);
                            }
                            $iteam->save();
                        }
                    }
                }
                return redirect()->back()->with(['messege'   =>  'Successfully inserted journal', 'alert-type' =>  'success']);
            }
        } else {
            return redirect()->back()->with(['messege'   =>  'Debit Credit amount not equal', 'alert-type' =>  'info']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function show(Journal $journal)
    {
        return view('admin.accounts.gl.show', compact('journal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $journal = Journal::find($id);
        return view('admin.accounts.gl.entry', compact('journal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $total_debit = $request->totalldebit;
        $total_credit = $request->totallcredit;
        if (!empty($total_debit) or !empty($total_credit)) {
            if ($total_debit == $total_credit) {
                $date = date('Y-m-d', strtotime($request->gl_date));
                $jurnal = Journal::find($request->slug);
                $jurnal->gl_date = $date;
                $jurnal->referance = $request->referance;
                $jurnal->src_referance = $request->src_referance;
                $jurnal->memo = $request->memo;
                $jurnal->updated_by = Auth::id();
                $jurnal->save();
                if ($request->slug) {
                    if ($request->account != null) {
                        $count = count($request->account);
                        for ($i = 0; $i < $count; $i++) {
                            $iteam = JournalDetail::find($request->id[$i]);
                            $iteam->journal_id = $request->slug;
                            $iteam->gl_id = $request->account[$i];
                            $iteam->txn_date = $date;
                            $iteam->memo = $request->desc[$i];
                            if($request->debit[$i]){
                                $iteam->amount = $request->debit[$i];
                            }else{
                                $iteam->amount = ($request->credit[$i]) * (-1);
                            }
                            $iteam->save();
                        }
                    }
                    return redirect()->back()->with(['messege'   =>  'Successfully Update journal', 'alert-type' =>  'success']);
                }
            } else {
                return redirect()->back()->with(['messege'   =>  'Debit Credit amount not equal', 'alert-type' =>  'info']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function softdelete(Request $request)
    {
        $id = $request->modal_id;
        $journal = Journal::find($id);
        $journal->delete();
        return redirect()->back()->with(['messege'   =>  'Deleted Journal Entry', 'alert-type' =>  'wrong']);
    }


    public function glInquiry(Request $request)
    {
        $gl_id_sel = $request->gl_id;
        $from = $request->from_date;
        $to = $request->to_date;
        $gl = GlAccount::find($gl_id_sel);

        if($from && $to){
            $previous_amount = JournalDetail::where('gl_id', $gl_id_sel)->whereDate('txn_date', '<', $from)->sum('amount');
            $journals = JournalDetail::where('gl_id', $gl_id_sel)->whereBetween('txn_date', [$from, $to])->get();
        }else{
            $previous_amount = 0;
            $journals = JournalDetail::where('gl_id', $gl_id_sel)->get();
        }
        $opening_balance = $gl->opening_balance + $previous_amount;
        return view('admin.accounts.gl_enquery', compact('journals', 'gl_id_sel', 'gl', 'opening_balance', 'from', 'to'));
    }
}
