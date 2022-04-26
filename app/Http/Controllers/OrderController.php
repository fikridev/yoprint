<?php

namespace App\Http\Controllers;

use App\Events\ImportCsvEvent;
use App\Imports\OrderImport;
use App\Jobs\ProcessImportCSV;
use App\Models\FileUpload;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('welcome');
    }
    
   

    public function importCSV(Request $request)
    {
        // $chunks = array_chunk($contactTemp, 250);
        // event(new ImportCsvEvent());
        $this->validate($request, [    
            'file'=>'required',
        ]);
        $file_name = $request->file('file')->getClientOriginalName();

        $fileUpload = new FileUpload();
        $fileUpload->filename = $file_name;
        $fileUpload->status = 'pending';
        $fileUpload->save();
        

        Excel::queueImport(new OrderImport, $request->file);
        return back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function orderList()
    {

        $order = FileUpload::all();
      

        return DataTables::of($order)
  
        ->editColumn('time', function ($row) {
            return $row->created_at;
        })
        ->editColumn('file_name', function ($row) {
            return ($row->filename);
        })
        ->editColumn('status', function ($row) {

            if($row->status == 'pending') {
                $status = '<span class="badge alert-info">Pending</span>';
            }

            if($row->status == 'processing') {
                $status = '<span class="badge alert-warning">Processing</span>';
            }

            if($row->status == 'failed') {
                $status = '<span class="badge alert-danger">Failed</span>';
            }

            if($row->status == 'completed') {
                $status = '<span class="badge alert-success">Completed</span>';
            }

            return $status;

        })
        ->rawColumns(['status'])
        ->make(true);
    }
}
