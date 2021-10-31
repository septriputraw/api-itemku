<?php
namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Type;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $report = Transaction::join('item', 'transaction.item_id', '=', 'item.id')
                              ->leftJoin('type', 'item.type_id', '=', 'type.id')
                              ->select('transaction.id', 'item.name as itemName', 'transaction.qty as qty', 'transaction.sold as sold', 'transaction.updated_at as dateTrx', 'type.name as itemType')
                              //->get();
                              ->paginate(10);

        return response()->json($report);
       // return view('home',['report' => $report]);
    }

    public function search(Request $request)
    {
        $query = $request->query;
        /*$report = Transaction::join('item', 'transaction.item_id', '=', 'item.id')
                              ->join('type', 'item.type_id', '=', 'type.id')
                              ->select('transaction.id', 'item.name as itemName', 'transaction.qty', 'transaction.sold', 'transaction.updated_at as dateTrx', 'type.name as typeName')
                              ->where('item', function (Builder $queri) {
                                  $queri->where('item.name', 'like', 'item');
                              })
                              //->filter(['itemName' => $query])
                              ->get();
        */

        $cari = $request->cari;

            // mengambil data dari table pegawai sesuai pencarian data
        $item = Item::join('transaction', 'item.id', 'transaction.item_id' )
        ->join('type', 'item.type_id', 'type.id')
        ->select('transaction.id as idTrx', 'item.name as itemName', 'transaction.qty as qty', 'transaction.sold as sold', 'transaction.updated_at as trxDate', 'type.name as itemType')
        ->where('item.name','like',"%".$cari."%")
        ->paginate();

        return response()->json($item);
    }

    public function tes()
    {
        $comments = Item::whereHasMorph('transaction', '*', function (Builder $query) {
            $query->where('name', 'like', 'K%');
        })->get();
        return response()->json($comments);
    }

    public function tes2()
    {
        $artikel = Item::all();
    	 return response()->json($artikel);
    }
}