<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;
use App\Models\siswa;
use App\Models\jenis_contact;
use File;
use Illuminate\Support\Facades\Session;

class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = siswa::paginate(5);
        $contact = jenis_contact::paginate(5);
        return view('master.masterContact', compact('data', 'contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $siswa = siswa::find($id);
        $jenis = jenis_contact::all();
        return view('createContact', compact('siswa', 'jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $message = [
            'required' => ':attribute harus diisi gaesss',
            'min' => ':attribute minimal :min karakter ya coy',
            'max' => ':attribute maksimal :max karakter gaess',
        ];

        //validasi form
        $this->validate($request, [
            'jenis_contact_id' => 'required|max:30',
            'deskripsi' => 'required|min:5|max:50',
        ], $message);

        //insert data
        $contact = new contact();
        $contact->siswa_id = $request->siswa_id;
        $contact->jenis_contact_id = $request->jenis_contact_id;
        $contact->deskripsi = $request->deskripsi;
        $contact->save();

        Session::flash('success', 'Data Berhasil Di Tambahkan');
        return redirect('/masterContact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = siswa::find($id)->contact()->get();
        return view('showContact', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = contact::find($id);
        $jenis = jenis_contact::all();
        return view('editContact', compact('contact', 'jenis'));
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
            'required' => ':attribute "minimal diisi"',
            'min' => ':attribute minimal :min karakter',
        ];

        $this->validate($request, [
            'jenis_contact_id' => 'required',
            'deskripsi' => 'required|min:5',
        ], $message);

        $contact = contact::find($id);
        $contact->siswa_id = $request->siswa_id;
        $contact->jenis_contact_id = $request->jenis_contact_id;
        $contact->deskripsi = $request->deskripsi;
        $contact->save();
        Session::flash('success', "Contact berhasil diupdate");
        return redirect('masterContact');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        contact::find($id)->delete();
        Session::flash('Success', 'Data Berhasil Di Hapus');
        return redirect('/masterContact');
    }

    public function hapus($id)
    {
        jenis_contact::find($id)->delete();
        Session::flash('success', 'Data Berhasil Di Hapus');
        return redirect('/masterContact');
    }

    public function tambahjenis(Request $request)
    {
        $message = [
            'required' => 'Form Harus Di Isi',
        ];

        $this->validate($request, [
            'jenis_contact' => 'required',
        ], $message);

        jenis_contact::create([
            'jenis_contact' => $request->jenis_contact,
        ]);

        Session::flash('message', "Jenis Kontak Baru Telah Di Tambahkan");
        return redirect('/masterContact');
    }

    public function tambahjenisview()
    {
        return view('createJenis');
    }

}
