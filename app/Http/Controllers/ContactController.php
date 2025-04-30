<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Visitors;
use App\Models\Map;

use Mail;

class ContactController extends Controller {

    // Create Contact Form

    function __construct() {

        $this->secret_key =env('SECRET_KEY');
        $this->id_desa =env('ID_DESA');
        $this->p_host= env('P_HOST');
        $this->kd_desa= env('K_P_DESA');
        $this->m_desa= env('M_DESA');


    }

    
    public function index(Request $request) {
        $halaman = 'contact';
        $contact = Contact::all();
        $visitors = Visitors::where('id_desa_skpd', $this->id_desa)->first();
        $map = Map::where('kode_desa', $this->m_desa )->get();

        if($visitors) {
            // session(['session'=>false]);
            if(session('session') != true){
                session(['session'=>true]);
                $visitors->jumlah = $visitors->jumlah + 1;
                $visitors->save();
            }
        }else{
            $visitors = Visitors::create([
                'id_desa_skpd'=> $this->id_desa,
                'jumlah' => 1
            ]);
        
        }

        return view('contact' , compact('contact','halaman', 'visitors', 'map'));
    }

    
    public function map(Request $request) {
        $halaman = 'map';
        $contact = Contact::all();
        $visitors = Visitors::where('id_desa_skpd', $this->id_desa)->first();
        $map = Map::where('kode_desa', $this->m_desa )->get();

        if($visitors) {
            // session(['session'=>false]);
            if(session('session') != true){
                session(['session'=>true]);
                $visitors->jumlah = $visitors->jumlah + 1;
                $visitors->save();
            }
        }else{
            $visitors = Visitors::create([
                'id_desa_skpd'=> $this->id_desa,
                'jumlah' => 1
            ]);
        
        }

        return view('map' , compact('map','halaman', 'visitors', 'map'));
    }

    // Store Contact Form data
    public function ContactUsForm(Request $request) {

        // Form validation
        $id_desa_skpd=env('ID_DESA','');

        $validatedData =$request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'


        ]);
        $validatedData['subject'] = $request->subject;
        $validatedData['phone'] = $request->phone;

        $validatedData['id_desa_skpd'] = $id_desa_skpd;

        // dd($validatedData);die;
        Contact::create($validatedData);

        //  Send mail to admin


        return back()->with('success', 'Pesan Anda Sudah Terkirim.');
    }

}
