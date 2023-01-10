<?php

namespace App\Http\Controllers;

use App\Exports\DailyDemandExport;
use App\Models\DailyDemand;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = DailyDemand::filter()->get();
        if (request()->has('export')) {
            return (new DailyDemandExport(Carbon::now()->format('Y-m-d')))->download('daily_demands.xlsx');
        }
        return view('reports.index', ['reports' => $reports]);
    }

    public function create()
    {
        return view('reports.create');
    }

    public function edit($id)
    {
        $report = DailyDemand::findOrFail($id);
        $i =1;
        dd($report->j_ . $i);
        $data = json_decode(json_encode($report->j_ + $i, true));
        dd($data);
        return view('reports.edit', ['report' => $report]);
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'time' => 'required',
            'j_1.*' => 'required',
            'j_1.pw' => 'required|numeric|max:1',
            'j_2.pw' => 'required|numeric|max:1',
            'j_3.pw' => 'required|numeric|max:1',
            'j_4.pw' => 'required|numeric|max:1',
            'j_5.pw' => 'required|numeric|max:1',
            'j_6.pw' => 'required|numeric|max:1',
            'j_7.pw' => 'required|numeric|max:1',
            'j_8.pw' => 'required|numeric|max:1',
            'j_9.pw' => 'required|numeric|max:1',
            'j_10.pw' => 'required|numeric|max:1',
            't_1.pw' => 'required|numeric|max:1',
            't_2.pw' => 'required|numeric|max:1',
            't_3.pw' => 'required|numeric|max:1',
            't_4.pw' => 'required|numeric|max:1',
//            'j_1.mw' => 'required|numeric|max:14',
//            'j_2.mw' => 'required|numeric|max:14',
//            'j_3.mw' => 'required|numeric|max:14',
//            'j_4.mw' => 'required|numeric|max:14',
//            'j_5.mw' => 'required|numeric|max:14',
//            'j_6.mw' => 'required|numeric|max:14',
//            'j_7.mw' => 'required|numeric|max:14',
//            'j_8.mw' => 'required|numeric|max:14',
//            'j_9.mw' => 'required|numeric|max:14',
//            'j_10.mw' => 'required|numeric|max:14',
//            't_1.mw' => 'required|numeric|max:14',
//            't_2.mw' => 'required|numeric|max:14',
//            't_3.mw' => 'required|numeric|max:14',
//            't_4.mw' => 'required|numeric|max:14',
            'j_2.*' => 'required',
            'j_3.*' => 'required',
            'j_4.*' => 'required',
            'j_5.*' => 'required',
            'j_6.*' => 'required',
            'j_7.*' => 'required',
            'j_8.*' => 'required',
            'j_9.*' => 'required',
            'j_10.*' => 'required',
            't_1.*' => 'required',
            't_2.*' => 'required',
            't_3.*' => 'required',
            't_4.*' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $data = $request->all();
        $data['created_by'] = \auth()->user()->id;
        $data['date'] = Carbon::parse($request->time)->format('Y-m-d H:i:s');
        DailyDemand::create($data);
        return response()->json(
            [
                'message' => 'Added successfully',
            ],
            200
        );
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $validator = \Validator::make($request->all(), [
            'id' => 'required',
        ], [
            'id.required' => 'Please select the report'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        DailyDemand::findOrFail($id)->delete();
        return response()->json(
            [
                'message' => 'Deleted',
            ],
            200
        );
    }

}
