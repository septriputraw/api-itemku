<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $item = Item::paginate(5);
        return response()->json($item);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:item',
        ]);
        $data = $request->all();
        $item = Item::create($data);

        return response()->json($item);
    }

    public function show($id)
    {
        $item = Item::find($id);

        if (!$item) {
            return response()->json(['message' => 'Data not found.'], 404);
        }
        
        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        $item = Item::find($id);

        if (!$item) {
            return response()->json(['message' => 'Data not found.'], 404);
        }

        $this->validate($request, [
            'name' => '',
            'type_id' => '',
            'qty' => '',
        ]);

        $data = $request->all();
        $item->fill($data);
        $item->save();

        return response()->json($item);
    }

    public function destroy($id)
    {
        $item = Item::find($id);

        if (!$item) {
            return response()->json(['message' => 'Data not found.'], 404);
        }

        $item->delete();

        return response()->json(['message' => 'Data deleted successfully.'], 200);
    }
}
