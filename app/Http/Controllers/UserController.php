<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = User::with('position', 'title', 'social_status', 'certificate', 'children', 'salaries', 'transportation','salaries.employee_intervention')->paginate(50);
        return view('home', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = validator($request->all(), [
            'name' => 'required|min:3|max:300',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->with('error', $validate->errors()->first());
        }
        $element = User::create($request->except('_token'));
        return redirect()->back()->with('success', 'User Created ;)');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = User::with('position', 'title', 'social_status', 'certificate', 'children', 'salaries', 'transportation','salaries.employee_intervention')->find($id);
        return view('user.edit', compact('element'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = validator($request->all(), [
            'name' => 'required|min:3|max:300',
            'employee_no' => 'required|numeric',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->with('error', $validate->errors()->first());
        }
        $element = User::whereId($id)->first();
        $element->update($request->except('_token', 'loan', 'taxes'));
        if ($element) {
            $element->salaries()->first()->employee_intervention->update(['loan' => $request->loan, 'taxes' => $request->taxes]);
        }
        return redirect()->route('home')->with('success', 'User Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
