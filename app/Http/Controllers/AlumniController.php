<?php

namespace STMIKPLK\Http\Controllers;

use Illuminate\Http\Request;
use STMIKPLK\Factories\AlumniFactory;
use STMIKPLK\Http\Requests;
use STMIKPLK\Http\Controllers\Controller;

class AlumniController extends Controller
{
    /** @var  AlumniFactory */
    protected $factory;
    public function __construct(AlumniFactory $alumniFactory)
    {
        $this->factory = $alumniFactory;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('alumni.index')
            ->with('layout', $this->getLayout());
    }

    public function getData()
    {
        return $this->factory->getData($this->pagingTableBootstrap());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->factory->getById(null);
        return view('alumni.form')
            ->with('method', 'put')
            ->with('action', route('alumni.store'))
            ->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\AlumniRequest $request)
    {
        $ret = $this->factory->store($request->except($this->getIntercoolerParams()));
        if($ret)
        {
            $request->session()->flash('message-success','Profile Berhasil Tersimpan');
            if ($this->isIntercoolerRequest()) {
                return $this->edit($this->factory->getLastInsertId());
            }
            return response()->make('success');
        }
        return response()->json(['system'=>'Error'], 422);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id=null)
    {
        $data = $this->factory->getById($id);
        return view('alumni.show')
            ->with('route_src', is_null($data)? route('alumni.create'):route('alumni.edit', ['id'=>$data->id]))
            ->with('layout', $this->getLayout())
            ->with('data', $data);
    }

    /**
     * layani request yang hanya ingin mendapatkan profile saja!
     * @param $id
     * @return $this
     */
    public function onlyProfile($id=null)
    {
        $data = $this->factory->getById($id);
        return view('alumni.onlyProfile')
            ->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->factory->getById($id);
        return view('alumni.form')
            ->with('method', 'post')
            ->with('action', route('alumni.update', ['id'=>$id]))
            ->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\AlumniRequest $request, $id)
    {
        $ret = $this->factory->update(
            $this->factory->getById($id),
            $request->except($this->getIntercoolerParams()));
        if($ret)
        {
            $request->session()->flash('message-success','Profile Berhasil Tersimpan');
            if ($this->isIntercoolerRequest()) {
                return $this->edit($id);
            }
            return response()->make('success');
        }
        return response()->json(['system'=>'Error'], 422);
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
