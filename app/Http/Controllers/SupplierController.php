<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SupplierController extends Controller
{
    public function addSupplier(Request $request)
    {
        $incomingData = $request->validate(
            [
                "name" => ["required", 'regex:/^[a-zA-Z ]+$/'],
                "email" => ["required", Rule::unique("suppliers", "supplier_email"), 'email', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
                "address" => ["required", 'regex:/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};:"\\|,.<>\/? ]+$/'],
                "phone" => ["required", 'regex:/^[0-9]+$/'],
            ]
        );
        $adminId = auth()->user()->id;
        $supplier = new Supplier([
            'supplier_name' => $incomingData['name'],
            'supplier_email' => $incomingData['email'],
            'supplier_address' => $incomingData['address'],
            'supplier_phone' => $incomingData['phone'],
            'admin_id' => $adminId,
            'last_update_by' => $adminId,
        ]);
        $supplier->save();
        return redirect('/addsupplier')->with('success', 'Supplier added successfully');
    }
    public function showSuppliers()
    {

        $suppliers = Supplier::with('admin')->paginate(5);
        if (!$suppliers) {
            return redirect('/suppliers')->with('error', 'Supplier not found');
        }
        return view('suppliers.suppliers', compact('suppliers'));
    }
    public function editSupplier($id)
    {

        $supplier = Supplier::with('admin')->where('supplier_id', $id)->first();

        if (!$supplier) {
            return redirect('/suppliers')->with('error', 'Supplier not found');
        }

        return view('suppliers.editsupplier', compact('supplier'));
    }

    public function updateSupplier(Request $request, $id)
    {
        $incomingData = $request->validate(
            [
                "name" => ["required", 'regex:/^[a-zA-Z ]+$/'],
                "address" => ["required", 'regex:/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};:"\\|,.<>\/? ]+$/'],
                "phone" => ["required", 'regex:/^[0-9]+$/'],
            ]
        );
        $supplier = Supplier::with('admin')->where('supplier_id', $id)->first();

        if (!$supplier) {
            return redirect('/suppliers')->with('error', 'Supplier not found');
        }
        $supplier->update([
            'supplier_name' => $incomingData['name'],
            'supplier_address' => $incomingData['address'],
            'supplier_phone' => $incomingData['phone'],
            'last_update_by' => auth()->user()->id,
        ]);
        return redirect('/suppliers')->with('success', 'Supplier updated successfully');

    }


    public function deleteSupplier($id)
    {
        $supplier = Supplier::with('admin')->where('supplier_id', $id)->first();

        if ($supplier) {
            $supplier->delete();
            return redirect('/suppliers')->with('success', 'Supplier deleted successfully');
        }

        return redirect('/suppliers')->with('error', 'Supplier not found');
    }

}
