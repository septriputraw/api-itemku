<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function __construct()
    {
        //\__construct code
    }
    
    public function index()
    {
        //\index code
        $type = Type::all();

        return response()->json([
            'status' => 'success',
            'data' => $type,
        ]);
    }
    
    public function show($id)
    {
        //\show code
        $type = Type::find($id);
        
        if (!$type) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data not found.',
            ]);
        }

        return response()->json($type);
    }
    
    public function new()
    {
        //\new code
    }
    
    public function create(Request $request)
    {
        //\create code
        $this->validate($request, [
            'name' => 'required|unique:type',
        ]);

        $data = $request->all();
        $type = Type::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil ditambahkan',
        ]);
        
    }
    
    public function edit($id = null)
    {
        //\edit code
    }
    
    public function update(Request $request, $id = null)
    {
        //\update code
        $type = Type::find($id);

        if (!$type) {
            return response()->json([
                'status' => 'Fail',
                'message' => 'Data not found.',
            ]);    
        }

        $data = $request->all();
        $type->fill($data);
        $type->save($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Data updated successfully.',
        ]);

    }
    
    public function remove($id = null)
    {
        // \remove code
    }
    
    public function delete($id)
    {
     //    \delete code
     $type = Type::find($id);

     if (!$type) {
         return response()->json([
             'status' => 'fail',
             'message' => 'data not found.',
         ], 404);
     }

     $type->delete();

     return response()->json([
         'message' => 'Data berhasail dihapus',
     ], 200);
    }
}