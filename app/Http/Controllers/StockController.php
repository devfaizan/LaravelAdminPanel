<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Supplier;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function addStock(Request $request)
    {
        $incomingData = $request->validate(
            [
                "pdate" => ["required"],
                "edate" => ["required"],
                "quantity" => ["required", 'regex:/^[0-9]+$/'],
                "cprice" => ["required", 'numeric'],
                "supplier" => ["required", 'regex:/^[0-9]+$/'],
            ]
        );
        $adminId = auth()->user()->id;

        $stock = new Stock([
            'purchase_date' => $incomingData['pdate'],
            'expire_date' => $incomingData['edate'],
            'quantity' => $incomingData['quantity'],
            'cost_price' => $incomingData['cprice'],
            'admin_id' => $adminId,
            'last_update_by' => $adminId,
            'supplier_id' => $incomingData['supplier'],
        ]);
        $stock->save();
        return redirect('/stocks')->with('success', 'Supplier added successfully');
    }
    public function showStocks()
    {

        $stocks = Stock::with('admin')->paginate(4);
        if (!$stocks) {
            return redirect('/stocks')->with('error', 'Stock not found');
        }
        return view('stocks.stocks', compact('stocks'));
    }
    public function editStock($id)
    {

        $stocks = Stock::with('admin')->where('stock_id', $id)->first();

        if (!$stocks) {
            return redirect('/stocks')->with('error', 'Stock not found');
        }

        return view('stocks.editstock', compact('stocks'));
    }
    public function updateStock(Request $request, $id)
    {
        $incomingData = $request->validate(
            [
                "pdate" => ["required"],
                "edate" => ["required"],
                "quantity" => ["required", 'regex:/^[0-9]+$/'],
                "cprice" => ["required", 'numeric'],
                "supplier" => ["required", 'regex:/^[0-9]+$/'],
            ]
        );
        $stocks = Stock::with('admin')->where('stock_id', $id)->first();
        $adminId = auth()->user()->id;

        if (!$stocks) {
            return redirect('/stocks')->with('error', 'Stock not found');
        }
        $stocks->update([
            'purchase_date' => $incomingData['pdate'],
            'expire_date' => $incomingData['edate'],
            'quantity' => $incomingData['quantity'],
            'cost_price' => $incomingData['cprice'],
            'last_update_by' => $adminId,
            'supplier_id' => $incomingData['supplier'],
        ]);
        return redirect('/stocks')->with('success', 'Stock updated successfully');
    }
    public function deleteStock($id)
    {
        $stocks = Stock::with('admin')->where('stock_id', $id)->first();

        if ($stocks) {
            $stocks->delete();
            return redirect('/stocks')->with('success', 'Stock deleted successfully');
        }

        return redirect('/stocks')->with('error', 'Stock not found');
    }
}
