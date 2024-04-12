<?php

namespace App\Http\Controllers;

use App\Models\SupplierPayment;
use Illuminate\Http\Request;

class SupplierPaymentController extends Controller
{
    public function addSupplierPayment(Request $request)
    {
        $incomingData = $request->validate(
            [
                "pdate" => ["required"],
                "amount" => ["required", 'numeric'],
                "sign" => ["required"],
                "supplier" => ["required", 'regex:/^[0-9]+$/'],
            ]
        );
        $adminId = auth()->user()->id;
        $supplierpayment = new SupplierPayment([
            'payment_date' => $incomingData['pdate'],
            'payment_amount' => $incomingData['amount'],
            'signedby' => $incomingData['sign'],
            'admin_id' => $adminId,
            'last_update_by' => $adminId,
            'supplier_id' => $incomingData['supplier'],
        ]);
        $supplierpayment->save();
        return redirect('/addsupplierpayment')->with('success', 'Supplier Payment added successfully');
    }
    public function showSupplierPayments()
    {

        $supplierpayments = SupplierPayment::with('admin')->paginate(4);
        if (!$supplierpayments) {
            return redirect('/supplierpayment')->with('error', 'Supplier Payment not found');
        }
        return view('payments.supplierpayments.payments', compact('supplierpayments'));
    }
    public function editSupplierPayment($id)
    {

        $supplierpayments = SupplierPayment::with('admin')->where('payment_id', $id)->first();

        if (!$supplierpayments) {
            return redirect('/supplierpayment')->with('error', 'Supplier Payment not found');
        }

        return view('payments.supplierpayments.editpayment', compact('supplierpayments'));
    }
    public function updateSupplierPayment(Request $request, $id)
    {
        $incomingData = $request->validate(
            [
                "pdate" => ["required"],
                "amount" => ["required", 'numeric'],
                "sign" => ["required"],
                "supplier" => ["required", 'regex:/^[0-9]+$/'],
            ]
        );
        $supplierpayments = SupplierPayment::with('admin')->where('payment_id', $id)->first();

        if (!$supplierpayments) {
            return redirect('/supplierpayment')->with('error', 'Supplier Payment not found');
        }
        $supplierpayments->update([
            'payment_date' => $incomingData['pdate'],
            'payment_amount' => $incomingData['amount'],
            'signedby' => $incomingData['sign'],
            'supplier_id' => $incomingData['supplier'],
        ]);
        return redirect('/supplierpayment')->with('success', 'Supplier Payment updated successfully');
        // Update the supplier details in the database
        // Redirect back with success or error message
    }
    public function deleteSupplierPayment($id)
    {
        $supplierpayments = SupplierPayment::with('admin')->where('payment_id', $id)->first();

        if ($supplierpayments) {
            $supplierpayments->delete();
            return redirect('/supplierpayment')->with('success', 'Supplier Payment deleted successfully');
        }

        return redirect('/supplierpayment')->with('error', 'Supplier Payment not found');
    }

}
