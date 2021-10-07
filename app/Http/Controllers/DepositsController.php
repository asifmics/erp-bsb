<?php

namespace App\Http\Controllers;

use App\BankAccount;
use App\DepositDetail;
use App\Deposits;
use App\Journal;
use App\JournalDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DepositsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Deposits::all();
        return view('admin.accounts.deposit_index', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.accounts.deposit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        DB::beginTransaction();
        try {
            $deposit = new Deposits();
            $deposit->date = $request->date;
            $deposit->referance = $request->referance;
            $deposit->bank_id = $request->bank_id;
            $deposit->order_of = $request->order_of;
            $deposit->memo = $request->memo;
            $deposit->created_by = Auth::id();
            $deposit->save();

            foreach ($request->amount as $key => $amount) {
                if ($amount) {
                    $deposit_detail = new DepositDetail();
                    $deposit_detail->deposit_id = $deposit->id;
                    $deposit_detail->gl_id = $request->account[$key];
                    $deposit_detail->amount = $request->amount[$key];
                    $deposit_detail->description = $request->desc[$key];
                    $deposit_detail->save();
                }
            }
            /**
             * Journal Entry 
             */
            $date = date('Y-m-d', strtotime($request->date));
            $jurnal = new Journal;
            $jurnal->gl_date = $date;
            $jurnal->referance = $request->referance;
            $jurnal->src_referance = 'Bank Deposit';
            $jurnal->memo = $request->memo;
            $jurnal->created_by = Auth::id();
            $jurnal->save();

            $total_amount = 0;
            foreach ($request->amount as $key => $amount) {
                if ($amount) {
                    $iteam = new JournalDetail;
                    $iteam->journal_id = $jurnal->id;
                    $iteam->gl_id = $request->account[$key];
                    $iteam->txn_date = $date;
                    $iteam->memo = $request->desc[$key];
                    $iteam->amount = $request->amount[$key]  * (-1);
                    $iteam->save();
                    $total_amount += $request->amount[$key];
                }
            }
            if ($total_amount) {
                $bank = BankAccount::find($request->bank_id);
                $iteam = new JournalDetail;
                $iteam->journal_id = $jurnal->id;
                $iteam->gl_id = $bank->account_gl_id;
                $iteam->txn_date = $date;
                $iteam->memo = $request->memo;
                $iteam->amount = $total_amount;
                $iteam->save();
            }
            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            logger($e);
        }

        return redirect()->back()->with('success', 'Successfully Deposit Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deposits  $deposits
     * @return \Illuminate\Http\Response
     */
    public function show(Deposits $deposit)
    {
        return view('admin.accounts.deposit_show', compact('deposit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deposits  $deposits
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposits $deposit)
    {
        return view('admin.accounts.deposit', compact('deposit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deposits  $deposits
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deposits $deposits)
    {
        // return $request;
        DB::beginTransaction();
        try {
            $deposit = Deposits::find($request->id);
            
            $jurnal = Journal::where('referance', $deposit->referance)
            ->where('src_referance', 'Bank Deposit')
            ->where('memo', $deposit->memo)
            ->first();
            $jurnal->journal_items()->delete();

            $deposit->date = $request->date;
            $deposit->referance = $request->referance;
            $deposit->bank_id = $request->bank_id;
            $deposit->order_of = $request->order_of;
            $deposit->memo = $request->memo;
            $deposit->updated_by = Auth::id();
            $deposit->save();
            $deposit->details()->delete();

            foreach ($request->amount as $key => $amount) {
                if ($amount) {
                    $deposit_detail = new DepositDetail();
                    $deposit_detail->deposit_id = $deposit->id;
                    $deposit_detail->gl_id = $request->account[$key];
                    $deposit_detail->amount = $request->amount[$key];
                    $deposit_detail->description = $request->desc[$key];
                    $deposit_detail->save();
                }
            }

            /**
             * Journal Entry 
             */
            $date = date('Y-m-d', strtotime($request->date));
            $jurnal->gl_date = $date;
            $jurnal->referance = $request->referance;
            $jurnal->src_referance = 'Bank Deposit';
            $jurnal->memo = $request->memo;
            $jurnal->created_by = Auth::id();
            $jurnal->save();

            $total_amount = 0;
            foreach ($request->amount as $key => $amount) {
                if ($amount) {
                    $iteam = new JournalDetail;
                    $iteam->journal_id = $jurnal->id;
                    $iteam->gl_id = $request->account[$key];
                    $iteam->txn_date = $date;
                    $iteam->memo = $request->desc[$key];
                    $iteam->amount = $request->amount[$key] * (-1);
                    $iteam->save();
                    $total_amount += $request->amount[$key];
                }
            }
            if ($total_amount) {
                $bank = BankAccount::find($request->bank_id);
                $iteam = new JournalDetail;
                $iteam->journal_id = $jurnal->id;
                $iteam->gl_id = $bank->account_gl_id;
                $iteam->txn_date = $date;
                $iteam->memo = $request->memo;
                $iteam->amount = $total_amount;
                $iteam->save();
            }
            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
        }
        return redirect()->route('deposit.show', $request->id)->with('success', 'Successfully Deposit updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deposits  $deposits
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposits $deposits)
    {
        //
    }
}
