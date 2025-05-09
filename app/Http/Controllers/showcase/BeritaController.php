<?php

namespace App\Http\Controllers\showcase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Models\Berita;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use App\Models\Category;
use App\Models\Visitors;
use Session;
use DB;
use Carbon\Carbon;
use App\Providers\AppServiceProvider;
use App\Models\Map;
use Illuminate\Support\Facades\URL;
use Jorenvh\Share\ShareFacade as Share;

class BeritaController extends Controller
{
    public function __construct(Request $request)
    {
        $this->secret_key = $request["secret_key"];
        $this->api_key =env('API_KEY','');
        $this->k_desa =env('K_DESA','');
        $this->id_desa =env('ID_DESA');
        $this->e_host= env('E_HOST');
        $this->m_desa= env('M_DESA');

    }

//    private function authorization($token)
//    {
////        print_r($token);die;
//        $user = \App\Models\Key::where('key', "$token")
//            ->where('key', $token)
//            ->get();
//        return $user;
//    }

private function authorization($token)
{
    if($token==$this->api_key ){
        $user = 1;
    }else{
        $user = 0;
    }
    return $user;
}




public function post_berita(Request $request)
{
    $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
    $check = $this->authorization($token);
    if ($check >0) {
        try {
                $data = new \App\Models\Post();
                $data->category_id = $request["category_id"];
                $data->title = $request["title"];
                $data->title_slug = $request["title_slug"];
                $data->content = $request["content"];
                $data->post_status = $request["post_status"];
                $data->author = $request["author"];
                $data->date = $request["date"];
                $data->picture = $request["picture"];
                $data->time = $request["time"];
                $data->hits = $request["hits"];
                $data->id_desa_skpd = $request["id_desa_skpd"];


                if ($data->picture && $data->picture->isValid()) {
                    $file_name = time() . '.' . $request->picture->extension();
                    $request->picture->move(public_path('images/foto_berita'), $file_name);
                    $path = "images/foto_berita/$file_name";
                    $data->picture = $path;
                }else{
                    return response()->json(['error' => 'true', 'message' => 'fgfgd']);
                }

                $data->save();
                return response()->json(['error' => 'false', 'message' => 'Data berhasil ditambahkan']);


        } catch (\Exception $e) {
            return response()->json(['error' => 'true', 'message' => $e->getMessage(), 'data' => []], 500);
        }


    }else{
        return response()->json(['error' => 'true', 'message' => 'Token Tidak valid']);
    }
}
public function update_berita(Request $request)
{

    $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
    $check = $this->authorization($token);
    if ($check > 0) {
        try {
            if ($request["picture"] && $request["picture"]->isValid()) {
                $file_name = time() . '.' . $request->picture->extension();
                $request->picture->move(public_path('images/foto_berita'), $file_name);
                $path = "images/foto_berita/$file_name";
                $picture = $path;
                $path2 = public_path()."/".$request['old_file'];
                File::delete($path2);
            }else{
                return response()->json(['error' => 'true', 'message' => 'fgfgd']);
            }


            $isi_berita=$request["content"];
            $input = array(
                'category_id' => $request->category_id,
                'title' => $request->title,
                'title_slug' =>$request->title_slug,
                'content' => $isi_berita,
                'post_status' => $request->post_status,
                'date' =>$request->date,
                'time' =>$request->time,
                'picture' =>$picture
            );

            Post::where('post_id',$request["post_id"])->update($input);


            return response()->json(['error' => 'false', 'message' => 'Data berhasil ditambahkan']);


        } catch (\Exception $e) {
            return response()->json(['error' => 'true', 'message' => $e->getMessage(), 'data' => []], 500);
        }


    }else{
        return response()->json(['error' => 'true', 'message' => 'Token Tidak valid']);
    }
}

public function delete_berita(Request $request)
{

    $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
    $check = $this->authorization($token);
    if ($check > 0) {
        try {

            Post::where('post_id',$request["post_id"])->delete();
            $path2 = public_path()."/".$request['picture'];
            File::delete($path2);
            return response()->json(['error' => 'false', 'message' => 'Data Berhasil Dihapus']);


        } catch (\Exception $e) {
            return response()->json(['error' => 'true', 'message' => $e->getMessage(), 'data' => []], 500);
        }


    }else{
        return response()->json(['error' => 'true', 'message' => 'Token Tidak valid']);
    }
}
    // public function index()
    // {

    //     $beritas = Berita::all();

    //     return view('showcase.berita', [
    //         'beritas' => $beritas
    //     ]);
    // }

    public function berita(Request $request)
    {


//        $client = new GuzzleClient([
//            'C-KEY' => $this->api_key
//        ]);
        $url='/api/ciamis/pegawaidesa/';
        $host=$this->e_host.$url;

        $response = Http::withHeaders([
            'C-KEY' => $this->api_key
        ])->GET($host, [
            'id_skpd' => $this->id_desa,
        ]);

        $a = json_decode($response->body(), true);
        $data['pegawaidesa'] = $a;

        $halaman = 'berita';

        $title = $request->title;
            if(!empty($title)){
            $berita = Berita::query()
            ->where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')
            ->where('title', 'like', "%" . $title . "%")
            ->orderBy('created_at', 'DESC')
            ->paginate(4);

        }else{

            $berita = Berita::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')->orderBy('created_at', 'DESC')->paginate(4);
        }

        // $berita = Berita::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')->orderBy('created_at', 'DESC')->paginate(6);
        $berita_popular  = Berita::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')->orderBy('hits', 'DESC')->limit(6)->get();
        $map = Map::where('kode_desa', $this->m_desa )->get();
    //    dd($berita);die;





    $archive = Berita::selectRaw('year(created_at) year, monthname(created_at) month, count(*) post ')
    ->groupBy('year', 'month')
    ->orderByRaw('min(created_at) DESC')
    ->where('id_desa_skpd', $this->id_desa)
    ->where('post_status', 'Publish')
    ->limit(12)
    ->get()->toArray();

// Fetch articles based on the selected month and year
$berita = Berita::where('id_desa_skpd', $this->id_desa)
    ->where('post_status', 'Publish')
    ->orderBy('created_at', 'DESC')
    ->paginate(4);

// Filter articles based on the selected year and month (in your view or controller)
if (request('year') && request('month')) {
    $berita = $berita->filter(function ($item) {
        return \Carbon\Carbon::parse($item->created_at)->year == request('year') &&
               \Carbon\Carbon::parse($item->created_at)->month == request('month');
    });
}
        $category = Category::all();


        $visitors = Visitors::where('id_desa_skpd', $this->id_desa)->first();

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

        return view('showcase.berita.berita', compact('berita', 'category', 'archive', 'berita_popular', 'data', 'map', 'visitors'));
    }

    public function detail_berita(string $item, Request $request)
    {
        $view = Berita::where('title_slug', $item)->limit(1)->increment('hits');
        $shareComponent = Share::page(
            URL::current(),
            'Share berita'
        )->facebook()->twitter()->telegram()->whatsapp();

        $data = Berita::where('title_slug', $item)->where('id_desa_skpd', $this->id_desa)->first();
        $berita_baru = Berita::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')->orderBy('created_at', 'DESC')->limit(5)->get();
        $berita_kaitan = Berita::where('id_desa_skpd', $this->id_desa)->where('title_slug', $item)->where('category_id', $data->category_id)->where('post_status', 'Publish')->limit(3)->get();
        $berita_popular  = Berita::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')->orderBy('hits', 'DESC')->limit(6)->get();


        $archive = Berita::selectRaw('year(created_at) year, monthname(created_at) month, count(*) post ')
    ->groupBy('year', 'month')
    ->orderByRaw('min(created_at) DESC')
    ->where('id_desa_skpd', $this->id_desa)
    ->where('post_status', 'Publish')
    ->limit(12)
    ->get()->toArray();

// Fetch articles based on the selected month and year
$berita = Berita::where('id_desa_skpd', $this->id_desa)
    ->where('post_status', 'Publish')
    ->orderBy('created_at', 'DESC')
    ->paginate(4);

// Filter articles based on the selected year and month (in your view or controller)
if (request('year') && request('month')) {
    $berita = $berita->filter(function ($item) {
        return \Carbon\Carbon::parse($item->created_at)->year == request('year') &&
               \Carbon\Carbon::parse($item->created_at)->month == request('month');
    });
}
        $category = Category::all();

// dd($category);
        $visitors = Visitors::where('id_desa_skpd', $this->id_desa)->first();

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

        return view('showcase.berita.detail_berita', compact('data', 'berita', 'category','view', 'archive','berita_baru', 'berita_kaitan', 'berita_popular','visitors','shareComponent'));

    }

    public function berita_kategori(string $slug, Request $request)
{
    $category = Category::where('category_slug', $slug)->first();

    // Cek apakah kategori ditemukan
    if (!$category) {
        abort(404, 'Kategori tidak ditemukan');
    }

    $category_list = Category::all();
    $berita_popular = Berita::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')->orderBy('hits', 'DESC')->limit(6)->get();
    $archive = Berita::selectRaw('year(created_at) year, monthname(created_at) month, count(*) post ')
        ->groupBy('year', 'month')
        ->orderByRaw('min(created_at) DESC')
        ->where('post_status', 'Publish')
        ->where('id_desa_skpd', $this->id_desa)
        ->limit(5)
        ->get()->toArray();
    $berita = Berita::where('category_id', $category->category_id)
        ->where('id_desa_skpd', $this->id_desa)
        ->where('post_status', 'Publish')
        ->orderBy('post_id', 'DESC')
        ->paginate(4);
    $berita1 = Berita::where('category_id', $category->category_id)
        ->where('id_desa_skpd', $this->id_desa)
        ->where('post_status', 'Publish')
        ->limit(1)
        ->get();

    $visitors = Visitors::where('id_desa_skpd', $this->id_desa)->first();

    if ($visitors) {
        if (session('session') != true) {
            session(['session' => true]);
            $visitors->jumlah = $visitors->jumlah + 1;
            $visitors->save();
        }
    } else {
        $visitors = Visitors::create([
            'id_desa_skpd' => $this->id_desa,
            'jumlah' => 1
        ]);
    }

    return view('showcase.berita.by_category', compact('berita', 'category', 'category_list', 'archive', 'berita1', 'visitors', 'berita_popular'));
}

public function arsip_berita($month, $year, Request $request)
{
    $berita_post1 = Berita::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish');

    if ($month = $request->input('month')) {
        $berita_post1->whereMonth('created_at', Carbon::parse($month)->month);
    }

    if ($year = $request->input('year')) {
        $berita_post1->whereYear('created_at', $year);
    }

    // Mengambil berita sesuai bulan dan tahun
    $berita = $berita_post1->orderBy('created_at', 'DESC')->paginate(4);

    // Mengambil berita populer
    $berita_popular  = Berita::where('id_desa_skpd', $this->id_desa)
                            ->where('post_status', 'Publish')
                            ->orderBy('hits', 'DESC')
                            ->limit(6)
                            ->get();

    // Mengambil arsip berita berdasarkan bulan dan tahun
    $archive = Berita::selectRaw('year(created_at) year, monthname(created_at) month, count(*) post ')
        ->groupBy('year', 'month')
        ->where('post_status', 'Publish')
        ->where('id_desa_skpd', $this->id_desa)
        ->orderByRaw('min(created_at) DESC')
        ->get()->toArray();

    $visitors = Visitors::where('id_desa_skpd', $this->id_desa)->first();
    if ($visitors) {
        if (session('session') != true) {
            session(['session' => true]);
            $visitors->jumlah = $visitors->jumlah + 1;
            $visitors->save();
        }
    } else {
        $visitors = Visitors::create([
            'id_desa_skpd' => $this->id_desa,
            'jumlah' => 1
        ]);
    }

    $category = Category::all();

    return view('showcase.berita.arsip_berita', compact('berita', 'category', 'archive', 'visitors', 'berita_popular'));
}

}
