<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\siswa;
use App\Models\project;
use File;

class projectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=siswa::paginate(5);
        return view('master.masterProject', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createProject');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function tambah($id){
        $siswa = siswa::find($id);
        return view('createProject', compact('siswa'));
     }

    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute harus diisi gaesss',
            'min' => ':attribute minimal :min karakter ya coy',
            'max' => ':attribute maksimal :max karakter gaess',
            'numeric' => ':attribute harus diisi angka'
        ];

        //validasi form
        $this->validate($request, [
            'nama_project' => 'required|min:5|max:30',
            'deskripsi' => 'required|min:5|max:50',
            'tanggal' => 'required',
        ], $message);

        //insert data
        project::create([
            'id_siswa' => $request->id_siswa,
            'nama_project' => $request->nama_project,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal
        ]);

        Session::flash('success', 'Data Berhasil Di Tambahkan');
        return redirect('/masterProject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $project=siswa::find($id)->project()->get();
        return view ('showProject', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = project::find($id);
        return view('editProject', compact('project'));
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
        $message = [
            'required' => ':attribute harus diisi gaesss',
            'min' => ':attribute minimal :min karakter ya coy',
            'max' => ':attribute maksimal :max karakter gaess',
            'numeric' => ':attribute harus diisi angka'
        ];

        //validasi form
        $this->validate($request, [
            'nama_project' => 'required|min:5|max:30',
            'deskripsi' => 'required|min:5|max:50',
            'tanggal' => 'required',
        ], $message);

        $project = project::find($id);
        $project->nama_project = $request->nama_project;
        $project->deskripsi = $request->deskripsi;
        $project->tanggal = $request->tanggal;

        $project->save();
        Session::flash('success', 'Data Berhasil Di Tambahkan');
        return redirect('/masterProject');
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

    public function hapus($id){
        $project = project::find($id)->delete();
        Session::flash('succes', 'Data berhasil di hapus');
        return redirect('/masterProject');
    }
}
