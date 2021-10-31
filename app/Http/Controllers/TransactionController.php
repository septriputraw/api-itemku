<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Item;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function __construct()
    {
        // construct code
    }
    
    public function index()
    {
        // index code
        $trx = Transaction::get();
        return response()->json($trx);
    }
    
    public function show($id = null)
    {
        // show code

    }
    
    public function new()
    {
        // new code
    }
    
    public function create(Request $request)
    {
        // create code
        $data = $request->all();
        $itemId = $request->item_id;
        $qty = DB::table('item')->where('id', $itemId)->pluck('qty');
        $itemQty = $qty[0];
        $sold = $request->sold;
        //$data = $request->all([$itemId, $request->qty = $itemQty, $sold]);
        $trx = Transaction::insertGetId($data);
        $updateTrx = Transaction::where('id', $trx)->update(['qty' => $itemQty]);
        $newQty = $qty[0] - $sold;
        Item::where('id', $itemId)->update(['qty' => $newQty]);
        return response()->json($updateTrx);
    }
    
    public function edit($id = null)
    {
         //\edit code
    }
    
    public function update($id = null)
    {
        //\update code
    }
    
    public function remove($id = null)
    {
        //\remove code
    }
    
    public function delete($id = null)
    {
        //\delete code
        $trx = Transaction::where('id', '=', $id)->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'data deleted',
        ]);
    }
}