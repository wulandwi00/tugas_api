<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    private $siswa;

    public function __construct(Siswa $siswa)
    {
        $this->siswa = $siswa;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        return $this->onSuccess('Siswa', $siswa, 'Founded');
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $siswa = $this->siswa->create($request->all());
            return $this->onSuccess('Siswa', $siswa, 'Created');
        } catch (\Exception $e) {
            return $this->onError($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = $this->siswa->find($id);
        return $this->onSuccess('Siswa', $siswa, 'Founded');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $siswa = $this->siswa->where('id', $id)->update($request->all());
            $siswa_data = $this->siswa->find($id);
            return $this->onSuccess('Data', $siswa_data, 'Updated');
        } catch (\Exception $e) {
            return $this->onError($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $siswa_data = $this->siswa->find($id);
            $siswa = $this->siswa->destroy($id);
            return $this->onSuccess('Data', $siswa_data, 'Deleted');
        } catch (\Exception $e) {
            return $this->onError($e);
        }
    }
}
