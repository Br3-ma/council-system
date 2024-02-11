<?php

namespace App\Http\Controllers;

use App\Models\Stream;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class RevenueStreamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->toArray();
        try {
            Stream::create([
                'name'=>$data['name'],
                'type'=>$data['type'],
                'code'=>$data['code'],
                'icon'=>$data['icon'],
                'amount'=>$data['amount'],
                'description'=>$data['description'],
                'user_id'=> auth()->user()->id,
            ]);
            session()->flash('success', 'Created Successfully');
            return redirect()->route('streams');
        } catch (\Throwable $th) {
            session()->flash('error', 'Oops something failed.'.$th->getMessage());
            return redirect()->route('streams');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $stream = Stream::find($id);

        if (!$stream) {
            return redirect()->route('streams.index')
                ->with('error', 'Revenue stream not found');
        }
    
        return view('livewire.dashboard.edit-revenue-stream', compact('stream'))->layout('layouts.app');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $stream = Stream::find($id);
    
        if (!$stream) {
            return redirect()->route('streams')
                ->with('error', 'Revenue stream not found');
        }
    
        // $request->validate([
        //     // Add validation rules for your form fields
        // ]);
    
        $stream->update($request->all());
    
        return redirect()->route('streams')
            ->with('success', 'Revenue stream updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $stream = Stream::find($id);
    
        if (!$stream) {
            return redirect()->route('streams')
                ->with('error', 'Revenue stream not found');
        }
    
        $stream->delete();
    
        return redirect()->route('streams')
            ->with('success', 'Revenue stream deleted successfully');
    }

    public function export_streams(){
    
        $streams = Stream::with('transacts')->get();
        
        $headers = [
            'Revenue Stream ID','Revenue Stream','Total Amount', 'Number of Transactions', 'Code', 'Type', 'Amount', 'Description'
        ];
        // Create a new Spreadsheet instance
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
    
        // Add headers to the sheet
        $sheet->fromArray([$headers], NULL, 'A1');
    
        // Add data to the sheet
        $data = [];
        foreach ($streams as $s) {

            $data[] = [
                $s->id,
                $s->name,
                $s->transacts->count(),
                $s->code,
                $s->type,
                $s->amount,
                $s->description,
            ];
        }

        // dd($data);
        $sheet->fromArray($data, NULL, 'A2');
    
        // Save the Excel file
        $fileName = 'Revenue Streams.xlsx';
        $writer = new Xlsx($spreadsheet);
    
        // Stream the file to the browser
        ob_start();
        $writer->save('php://output');
        $content = ob_get_clean();
    
        return response($content)
            ->header('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
            ->header('Content-Disposition', 'attachment;filename="' . $fileName . '"')
            ->header('Cache-Control', 'max-age=0');
    }
    
}
