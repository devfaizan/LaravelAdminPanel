<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerPayment;

class CustomerPaymentController extends Controller
{
    //
    public function addCustomerPayment(Request $request)
    {
        $incomingData = $request->validate([
            "pdate" => ["required"],
            "amount" => ["required", 'numeric'],
            "sign" => ["required"],
            "customer" => ["required", 'numeric'],
        ]);

        $adminId = auth()->user()->id;

        $customerpayments = new CustomerPayment([
            'payment_date' => $incomingData['pdate'],
            'payment_amount' => $incomingData['amount'],
            'signedby' => $incomingData['sign'],
            'admin_id' => $adminId,
            'last_update_by' => $adminId,
            'customer_id' => $incomingData['customer'],
        ]);

        $customerpayments->save();

        return redirect('/addcustomerpayment')->with('success', 'Customer Payment added successfully');
    }
    public function showCustomerPayments()
    {

        $customerpayments = CustomerPayment::with('admin')->paginate(4);

        if (!$customerpayments) {
            return redirect('/customerpayment')->with('error', 'Payment not found');
        }
        return view('payments.customerpayments.payments', compact('customerpayments'));
    }
    public function editCustomerPayment($id)
    {

        $customerpayments = CustomerPayment::with('admin')->where('payment_id', $id)->first();

        if (!$customerpayments) {
            return redirect('/customerpayment')->with('error', 'Customer Payment not found');
        }

        return view('payments.customerpayments.editpayment', compact('customerpayments'));
    }
    public function updateCustomerPayment(Request $request, $id)
    {
        $incomingData = $request->validate(
            [
                "pdate" => ["required"],
                "amount" => ["required", 'numeric'],
                "sign" => ["required"],
                "customer" => ["required", 'regex:/^[0-9]+$/'],
            ]
        );
        $customerpayments = CustomerPayment::with('admin')->where('payment_id', $id)->first();

        if (!$customerpayments) {
            return redirect('/customerpayment')->with('error', 'Customer Payment not found');
        }
        $customerpayments->update([
            'payment_date' => $incomingData['pdate'],
            'payment_amount' => $incomingData['amount'],
            'signedby' => $incomingData['sign'],
            'customer_id' => $incomingData['customer'],
        ]);
        return redirect('/customerpayment')->with('success', 'Customer Payment updated successfully');

    }
    public function deleteCustomerPayment($id)
    {
        $customerpayments = CustomerPayment::with('admin')->where('payment_id', $id)->first();

        if ($customerpayments) {
            $customerpayments->delete();
            return redirect('/customerpayment')->with('success', 'Customer Payment deleted successfully');
        }

        return redirect('/customerpayment')->with('error', 'Customer Payment not found');
    }
}
