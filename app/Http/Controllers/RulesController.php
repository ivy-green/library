<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rule;
use App\Models\RuleType;

use Carbon\Carbon;

class RulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rule_types = RuleType::all();
        $rules = Rule::all();
        return view('management.rules.index', compact('rules', 'rule_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rule_types = RuleType::all();
        $rules = Rule::all();
        return view('management.rules.create', compact('rules', 'rule_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $currentTime = Carbon::now();

        $this->validate($request, [
            'noidung' => 'required',
            'maloai' => 'required',
        ]);
        
        $rule = new Rule;
        $rule->noidung = $request->input('noidung');
        $rule->maloai = $request->get('typeid');
        $rule->created_at = $currentTime;

        $rule->save();

        return redirect('/rules')->with('success', 'Đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('management.rules.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rule_types = RuleType::all();
        $rule = Rule::findOrFail($id);
        return view('management.rules.edit', compact('rule', 'rule_types'));
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
        $currentTime = Carbon::now();

        $this->validate($request, [
            'noidung' => 'required',
        ]);

        $rule = Rule::find($id);
        $rule->noidung = $request->input('noidung');

        $rule->save();

        return redirect('/rules')->with('success', 'Đã chỉnh sửa thành công');
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
}
