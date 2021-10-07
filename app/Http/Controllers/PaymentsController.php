<?php

namespace App\Http\Controllers;

use App\BankAccount;
use App\Journal;
use App\JournalDetail;
use App\PaymentDetail;
use App\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Payments::all();
        return view('admin.accounts.payment_index', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.accounts.payment');
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
            $payment = new Payments();
            $payment->date = $request->date;
            $payment->referance = $request->referance;
            $payment->bank_id = $request->bank_id;
            $payment->order_of = $request->order_of;
            $payment->memo = $request->memo;
            $payment->created_by = Auth::id();
            $payment->save();

            foreach ($request->amount as $key => $amount) {
                if ($amount) {
                    $payment_detail = new PaymentDetail();
                    $payment_detail->payment_id = $payment->id;
                    $payment_detail->gl_id = $request->account[$key];
                    $payment_detail->amount = $request->amount[$key];
                    $payment_detail->description = $request->desc[$key];
                    $payment_detail->save();
                }
            }

            /**
             * Journal Entry 
             */
            $date = date('Y-m-d', strtotime($request->date));
            $jurnal = new Journal;
            $jurnal->gl_date = $date;
            $jurnal->referance = $request->referance;
            $jurnal->src_referance = 'Bank Payment';
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
                    $iteam->amount = $request->amount[$key];
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
                $iteam->amount = $total_amount * (-1);
                $iteam->save();
            }
            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
        }
        return redirect()->back()->with('success', 'Successfully Payment Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function show(Payments $payment)
    {
        return view('admin.accounts.payment_show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function edit(Payments $payment)
    {
        return view('admin.accounts.payment', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payments $payments)
    {
        // return $request;
        DB::beginTransaction();
        try {
            $payment = Payments::find($request->id);

            $jurnal = Journal::where('referance', $payment->referance)
            ->where('src_referance', 'Bank Payment')
            ->where('memo', $payment->memo)
            ->first();
            $jurnal->journal_items()->delete();

            $payment->date = $request->date;
            $payment->referance = $request->referance;
            $payment->bank_id = $request->bank_id;
            $payment->order_of = $request->order_of;
            $payment->memo = $request->memo;
            $payment->updated_by = Auth::id();
            $payment->save();
            $payment->details()->delete();
            foreach ($request->amount as $key => $amount) {
                if ($amount) {
                    $payment_detail = new PaymentDetail();
                    $payment_detail->payment_id = $payment->id;
                    $payment_detail->gl_id = $request->account[$key];
                    $payment_detail->amount = $request->amount[$key];
                    $payment_detail->description = $request->desc[$key];
                    $payment_detail->save();
                }
            }
            /**
             * Journal Entry 
             */
            $date = date('Y-m-d', strtotime($request->date));
            $jurnal->gl_date = $date;
            $jurnal->referance = $request->referance;
            $jurnal->src_referance = 'Bank Payment';
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
                    $iteam->amount = $request->amount[$key];
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
                $iteam->amount = $total_amount * (-1);
                $iteam->save();
            }
            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            // something went wrong
        }
        return redirect()->route('payment.show', $request->id)->with('success', 'Successfully Payment Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payments $payments)
    {
        //
    }


    public function deposit()
    {
        return view('admin.accounts.deposit');
    }


    public function transfer()
    {
        return view('admin.accounts.transfer');
    }
    public function glEntry()
    {
    }
    public function glEntrystore(Request $request)
    {
    }
    public function glEntryedit($id)
    {
    }

    public function reconcile()
    {
        return view('admin.accounts.reconcile');
    }

    public function journalInquiry()
    {
        return view('admin.accounts.journal_enquery');
    }
    public function glInquiry()
    {
        return view('admin.accounts.gl_enquery');
    }
    public function bankInquiry()
    {
        return view('admin.accounts.bank_enquery');
    }
}
