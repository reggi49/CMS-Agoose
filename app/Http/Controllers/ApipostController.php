<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\PostSeo;
use App\Models\PostCategories;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class ApipostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::paginate(7);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function featured(Request $request)
	{
		// limit untuk nanti
		$limit = $request->limit;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$posts = Post::where('featured', 1)
		->paginate(10);
 
    		// mengirim data pegawai ke view index
		return $posts;
 
	}

    public function search(Request $request)
	{
		// menangkap data pencarian
		$keyword = $request->keyword;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$posts = Post::where('title','like',"%".$keyword."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return $posts;
 
	}

    public function Categories(Request $request)
	{
		// menangkap data pencarian
		$keyword = $request->keyword;
        $keyword = explode(",", $keyword);
        
    		// mengambil data dari table pegawai sesuai pencarian data
		$posts = Post::where(function($query) use ($keyword){
            foreach ($keyword as $keyword) {
                $query->orWhere('categories', 'LIKE', '%'.$keyword.'%');
            }
        })
		->paginate(7);
 
    		// mengirim data pegawai ke view index
		return $posts;
 
	}

    public function Listcategories(Request $request)
	{
        return PostCategories::all();
 
	}
    
    public function loved(Request $request)
    {
        $id_posts = $request->id_posts;
        $id_users = $request->id_users;
        $likes = $request->likes;
        $existseo = PostSeo::where('id_posts', '=', $id_posts)
         ->where('id_users', '=', $id_users)
         ->first();

        
        if ($existseo !== null ) {
            if($likes === '1'  || $likes === '2'){
                PostSeo::where('id_posts', $id_posts)
                 ->update(['likes' => $likes]);

                return "liked";
            }else{  
                PostSeo::where('id_posts',$id_posts)
                ->increment('views'); 
                return "views ditambah";
            }
        }else {
            $postseo = new PostSeo;
            $postseo->id_posts = $request->id_posts;
            $postseo->id_users = $request->id_users;
            $postseo->views = $request->views;
            $postseo->comment = $request->comment;
            $postseo->likes = $request->likes;
            $postseo->save();
            
            return "data berhasil masuk";
        }
    }

    public function lastview(Request $request)
    {
        $postseo = new PostSeo;
        $id_posts = $request->id_posts;
        $id_users = $request->id_users;
        $postloved->save();

        return "data berhasil masuk";
    }

    public function mostpopular(Request $request)
    {
        $posts = Post::whereDateBetween('updated_at',(new Carbon)->subDays(10)->startOfDay()->toDateString(),(new Carbon)->now()->endOfDay()->toDateString() )
        ->orderBy('views','desc')
        ->paginate(7);
        return $posts;
    }

    public function create(Request $request)
    {
        $postseo = new PostSeo;
        $id_posts = $request->id_posts;
        $id_users = $request->id_users;
        $postloved->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function views(Request $request, $videoId)
    {
        Post::where('videoId',$videoId)
        ->increment('views');
        
        return "views berhasil ditambah";
    }
    public function update(Request $request, $videoId)
    {
        // $views = $request->views;
        // $post = Post::find($videoId);
        // Post::where('videoId',$videoId)
        // ->increment('views');


        // return "data berhasil di simpan";
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
