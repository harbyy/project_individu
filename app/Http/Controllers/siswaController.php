<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;
use File;
use Illuminate\Support\Facades\Session;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = siswa::all();
        return view('master.masterSiswa', compact ('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createSiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messege=[
            'required' => ':attribute "minimal diisi blok"',
            'min' => ':attribute minimal :min karakter ya suu',
            'max' => ':attribute maksimal :max karakter suu',
            'numeric' => ':attribute kudu diisi angka blok!!',
            'mimes' => 'file :attribute harus bertipe jpg, png, jpeg'
        ];

        //validasi form
        $this->validate ($request,[
            'nama' => 'required|min:3|max:30',
            'nisn' => 'required|numeric',
            'alamat' => 'required',
            'jk' => 'required',
            'foto' => 'required|mimes:jpg,png,jpeg',
            'about' => 'required|min:5'
        ], $messege);

        //ambil parameter
        $file = $request->file('foto');
        //rename
        $nama_file = time()."_".$file->getClientOriginalName();

        $tujuan_upload = './template/img';
        $file->move($tujuan_upload,$nama_file);

        //Insert data
        siswa::create([
            'nama' => $request -> nama,
            'nisn' => $request -> nisn,
            'alamat' => $request -> alamat,
            'jk' => $request -> jk,
            'foto' => $nama_file,
            'about' => $request -> about
        ]);
        Session::flash('success', 'Data berhasil di tambahkan');
        return redirect('/masterSiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa=Siswa::find($id);
        $contacts = $siswa->contact()->get();
        return view('showSiswa',compact('siswa', 'contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa=Siswa::find($id);
        return view('editSiswa', compact('siswa'));
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
        $messege=[
            'required' => ':attribute "minimal diisi blok"',
            'min' => ':attribute minimal :min karakter ya suu',
            'max' => ':attribute maksimal :max karakter suu',
            'numeric' => ':attribute kudu diisi angka blok!!',
            'mimes' => 'file :attribute harus bertipe jpg, png, jpeg'
        ];

        $this->validate ($request,[
            'nama' => 'required|min:3|max:30',
            'nisn' => 'required|numeric',
            'alamat' => 'required',
            'jk' => 'required',
            'foto' => 'mimes:jpg,png,jpeg',
            'about' => 'required|min:5'
        ], $messege);

        if ($request->foto != ''){
        
        //menghapus file foto lama
        $siswa=Siswa::find($id);
        file::delete('./template/img/'.$siswa->foto);

        //ambil informasi file foto baru yang diupload
        $file = $request->file('foto');
        //rename
        $nama_file = time()."_".$file->getClientOriginalName();

        //proses upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload,$nama_file);

        //menyimpan ke database
        $siswa -> nama = $request->nama;
        $siswa -> nisn = $request->nisn;
        $siswa -> alamat = $request->alamat;
        $siswa -> jk = $request->jk;
        $siswa -> foto = $nama_file;
        $siswa -> about = $request->about;
        $siswa -> save();
        return redirect ('masterSiswa');

        }else{
        $siswa=Siswa::find($id);
        $siswa -> nama = $request->nama;
        $siswa -> nisn = $request->nisn;
        $siswa -> alamat = $request->alamat;
        $siswa -> jk = $request->jk;
        $siswa -> about = $request->about;
        $siswa -> save();
        return redirect ('masterSiswa');
        }
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

    public function hapus($id)
    {
       $siswa = siswa::find($id);
       $siswa->delete();
       Session::flash('success', 'Data Berhasil Dihapus');
       return redirect('/masterSiswa');
    }
}
 