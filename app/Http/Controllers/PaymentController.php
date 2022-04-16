<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Sale;
use App\Models\User;
use App\Models\Employee;
use App\Models\Customer;
use App\Models\PaymentMethod;
use App\Models\AssignUser;
use App\Models\Payroll;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $payments = Payment::where('purchase_order_id', $id)->orderBy('id', 'desc')->get();
        return view('payment.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $sale = Sale::find($id);
        $user = User::find($sale->user_id);
        $customer = Customer::find($sale->customer->id);
        $payment_methods = PaymentMethod::all();

        return view('payment.create', compact('sale', 'customer', 'payment_methods', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'user_id'           => 'required',
                'payment_method_id' => 'required',
                'balance'           => 'required',
                'amount'            => 'required',
                'concept'            => 'required',
            ],

            [
                'payment_method_id.required'    => 'El Metodo de Pago es necesario',
                'amount.required'               => 'El Abono es necesario',
                'concept.required'              => 'El Concepto es necesario',
            ],
        );

        $payment = Payment::create(
            [
                'sale_id'           => $request->sale_id,
                'purchase_order_id' => $request->purchase_order_id,
                'user_id'           => $request->user_id,
                'customer_id'       => $request->customer_id,
                'reference'         => $request->reference,
                'payment_method_id' => $request->payment_method_id,
                'balance'           => $request->balance,
                'amount'            => $request->amount,
                'concept'           => $request->concept,
            ]
        );

        if($payment) {
            $amount = floatval($request->amount);
            $balance = floatval(str_replace(',', '', $request->balance));
            
            $sale = Sale::find($request->sale_id);
            $new_balance = $balance - $amount;
            $sale->update(
                [
                    'balance' => $new_balance,
                ],
            );

            try {
                $assign_user = AssignUser::where('user_id', '=', $request->user_id)->firstOrFail();

                $employee = Employee::find($assign_user->employee_id);

                if($employee->payment_frequency_id == 5) {
                    $payroll = ($employee->salary/100) * $amount;
                }
                
                $employee_id = $employee->id;
                $status = 1;
            } catch(ModelNotFoundException $e){
                $employee_id = 0;
                $payroll = $amount;
                $status = 0;
            }

            Payroll::insert([
                'user_id'       => $request->user_id,
                'employee_id'   => $employee_id,
                'amount'        => $payroll,
                'status'        => $status,
            ]);

            $notification = array(
                'message' => 'Abono registrado',
                'alert-type' => 'success'
            );
    
            return redirect()->route('sale.index')->with($notification); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
