<?php

namespace App\Http\Controllers\Backstage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backstage\Symbols\StoreRequest;
use App\Http\Requests\Backstage\Symbols\UpdateRequest;
use App\Models\Symbol;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class SymbolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backstage.symbols.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backstage.symbols.create', [
            'symbol' => new Symbol(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Backstage\Symbols\StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();
        $image = $request->file('image');
        // set file name, date, symbol_name
        $symbol_image_filename = Carbon::now()->format('Y-m-d-H-i-s').'-'.strtolower($validated['name']).'.'.$image->getClientOriginalExtension();
        $validated['image'] = 'storage/'.$image->storeAs('symbols', $symbol_image_filename);
        Symbol::create($validated);
        session()->flash('success', 'The symbol has been created!');
        return redirect()->route('backstage.symbols.index');
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
    public function edit(Symbol $symbol)
    {
        return view('backstage.symbols.edit', compact('symbol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Backstage\Symbols\UpdateRequest $request
     * @param  Symbol $symbol
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Symbol $symbol)
    {
        $validated = $request->validated();
        
        // set file name, date, symbol_name
        if($request->hasFile('image')){
            Storage::delete($symbol->image);
            $image = $request->file('image');
            $symbol_image_filename = Carbon::now()->format('Y-m-d-H-i-s').'-'.strtolower($validated['name']).'.'.$image->getClientOriginalExtension();
            $validated['image'] = 'storage/'.$image->storeAs('symbols', $symbol_image_filename);
        }
        $symbol->update($validated);
        session()->flash('success', 'The symbol has been updated!');
        return redirect()->route('backstage.symbols.edit', $symbol->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Symbol $symbol)
    {
        $symbol->forceDelete();

        if (request()->ajax()) {
            return response()->json(['status' => 'success']);
        }
        session()->flash('success', 'The symbol has been removed!');

        return redirect(route('backstage.symbols.index'));        
    }
}
