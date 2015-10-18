<?php

namespace STMIKPLK\Http\Controllers;

use Illuminate\Http\Request;
use STMIKPLK\Factories\PengumumanFactory;
use STMIKPLK\Factories\PostFactory;
use STMIKPLK\Http\Requests;
use STMIKPLK\Http\Controllers\Controller;

class PengumumanController extends Controller
{
    /** @var  PengumumanFactory */
    protected $factory;
    /** @var  PostFactory */
    protected $postFactory;
    public function __construct(PengumumanFactory $pengumumanFactory, PostFactory $postFactory)
    {
        $this->factory = $pengumumanFactory;
        $this->postFactory = $postFactory;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengumuman.index', ['layout'=>$this->getLayout()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengumuman.form')
            ->with('method', 'put')
            ->with('icTargetId', $this->getIntercoolerValue('ic-target-id'))
            ->with('action', route('pengumuman.store'))
            ->with('data', null);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PengumumanRequest $request)
    {
        $ret = $this->factory->store($request->except($this->getIntercoolerParams()));
        if($ret)
        {
            if ($this->isIntercoolerRequest()) {
                return \Response::make(
                    view('pengumuman._tambah')
                    ->with('pesan_awal',"Pengumuman berhasil ditambahkan")
                    ->render(),
                    200, ['X-IC-Trigger'=>'pengumuman/refreshPengumumanSendiri']);
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
        $data = $this->factory->getById($id);
        return view('pengumuman.form')
            ->with('method', 'post')
            ->with('icTargetId', $this->getIntercoolerValue('ic-target-id'))
            ->with('icTargetSuccess', \Input::get('icTargetSuccess'))
            ->with('action', route('pengumuman.update', ['id'=>$id]))
            ->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PengumumanRequest $request, $id)
    {
        $ret = $this->factory->update($this->factory->getById($id), $request->except($this->getIntercoolerParams()));
        if($ret)
        {
            if ($this->isIntercoolerRequest())
            {
                // kembalikan nilai item pengumuman yang terupdate!
                return response()->make(view('pengumuman._item_pengumuman')
                        ->with('p', $this->postFactory->getById($id))
                        ->render());
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
        $ret = $this->factory->destroy($id);
        if($ret)
        {
            return response('deleted',200, ['X-IC-Remove'=>true]);
        }
        return response()->json(['error'=>'Failed!'], 422, ['X-IC-Remove'=>false]);
    }

    /**
     * Dapatkan daftar pengumuman berdasarkan $author
     * @param null $author bila null maka ambil semua ...
     */
    public function getDaftar($author=null)
    {
        return view('pengumuman._index_sendiri')
            ->with('author', $author);
    }
}
