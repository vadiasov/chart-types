<?php

namespace Vadiasov\ChartTypes\Controllers;

use App\ChartType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Countries\Package\Countries;
use Vadiasov\ChartTypes\Requests\ChartTypeRequest;

class ChartTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active     = 'chartTypes';
        $user       = Auth::user();
        $chartTypes = ChartType::all();
        
        return view('chart-types::index', compact(
            'active',
            'user',
            'chartTypes'
        ));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active    = 'chartTypes';
        $user      = Auth::user();
        $countries = new Countries();
        $all       = $countries->all()
            ->sortBy('name')
            ->pluck('name.common');
        
        return view('chart-types::create', compact(
            'active',
            'user',
            'all'
        ));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \Vadiasov\ChartTypes\Requests\ChartTypeRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ChartTypeRequest $request)
    {
        $type = new ChartType([
            'parent'      => $request->parent,
            'country'     => ($request->country != 'Choose Country' ? $request->country : ''),
            'title'       => $request->title,
            'tag'         => $request->tag,
            'description' => $request->description,
        ]);
        
        $type->save();
        
        return redirect(route('admin/chart-types'))->with('status', 'New Chart Type has been created!');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $active    = 'chartTypes';
        $user      = Auth::user();
        $chartType = ChartType::whereId($id)->first();
        $countries = new Countries();
        $all       = $countries->all()
            ->sortBy('name')
            ->pluck('name.common');
        
        return view('chart-types::edit', compact(
            'active',
            'user',
            'chartType',
            'all'
        ));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param \Vadiasov\ChartTypes\Requests\ChartTypeRequest $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ChartTypeRequest $request, $id)
    {
        $chartType = ChartType::whereId($id)->first();
        
        $chartType->parent  = $request->parent;
        $chartType->country = ($request->country != 'Choose Country' ? $request->country : '');
        
        if ($request->parent == 'common') {
            $chartType->country = '';
        }
        
        $chartType->title       = $request->title;
        $chartType->tag         = $request->tag;
        $chartType->description = $request->description;
        
        $chartType->save();
        
        return redirect(route('admin/chart-types'))->with('status', 'The Chart Type has been edited!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chartType = ChartType::whereId($id);
        
        $chartType->delete();
        
        return redirect(route('admin/chart-types'))->with('status', 'The Chart Type has been deleted!');
    }
}
