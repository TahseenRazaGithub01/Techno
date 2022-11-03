<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sender;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SenderRequest;
use App\Http\Requests\SenderUpdateRequest;
use Illuminate\Support\Str;
use Image;
use App\Helpers\helper as Helper;
use Input;

class SenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sender.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SenderRequest $request)
    {
        Sender::create($request->all());

        return back()->with('success', 'Sender has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sender  $sender
     * @return \Illuminate\Http\Response
     */
    public function show(Sender $sender)
    {
        $senders = Sender::select('id','name','number')->orderBy('id', 'DESC')->get();

        return view('admin.sender.listing', compact('senders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sender  $sender
     * @return \Illuminate\Http\Response
     */
    public function edit(Sender $sender, $id)
    {
        $record = $sender::whereId($id)->first();

        if($record != false){
            return view('admin.sender.edit', compact('record'));
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sender  $sender
     * @return \Illuminate\Http\Response
     */
    public function update(SenderUpdateRequest $request, Sender $sender)
    {
		
        $sender = Sender::find($request['id']);
		
		$sender->update($request->all());
		
		return redirect(route('admin.sender.listing'))->with('success', 'Sender has been updated successfully.');
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sender  $sender
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sender $sender)
    {
        $detail = Sender::findOrFail(request()->id);
        $detail->delete();
        return back()->with('success', 'Sender has been deleted successfully.');
    }
}
