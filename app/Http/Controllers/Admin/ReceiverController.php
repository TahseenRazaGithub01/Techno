<?php

namespace App\Http\Controllers\Admin;

use App\Models\Receiver;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ReceiverRequest;
use App\Http\Requests\ReceiverUpdateRequest;
use Illuminate\Support\Str;
use Image;
use App\Helpers\helper as Helper;
use Input;

class ReceiverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.receiver.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReceiverRequest $request)
    {
        Receiver::create($request->all());

        return back()->with('success', 'Receiver has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receiver  $receiver
     * @return \Illuminate\Http\Response
     */
    public function show(Receiver $receiver)
    {
        $receivers = Receiver::select('id','receiver_name','bank_name','account_number')->orderBy('id', 'DESC')->get();

        return view('admin.receiver.listing', compact('receivers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receiver  $receiver
     * @return \Illuminate\Http\Response
     */
    public function edit(Receiver $receiver, $id)
    {
        $record = $receiver::whereId($id)->first();

        if($record != false){
            return view('admin.receiver.edit', compact('record'));
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receiver  $receiver
     * @return \Illuminate\Http\Response
     */
    public function update(ReceiverUpdateRequest $request, Receiver $receiver)
    {
        $receiver = Receiver::find($request['id']);
        
        $receiver->update($request->all());
        
        return redirect(route('admin.receiver.listing'))->with('success', 'Receiver has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receiver  $receiver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receiver $receiver)
    {
        $detail = Receiver::findOrFail(request()->id);
        $detail->delete();
        return back()->with('success', 'Receiver has been deleted successfully.');
    }
}
