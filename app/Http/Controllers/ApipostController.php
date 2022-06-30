<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\PostSeo;
use App\Models\PostCategories;
use App\Models\PostChannels;
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
        return Post::orderBy('id','desc')->paginate(12);
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
 
		$posts = Post::orderBy('updated_at', 'DESC')
        ->where('featured', 1)
		->paginate(18);
 
    		// mengirim data pegawai ke view index
		return $posts;
 
	}

    public function search(Request $request)
	{
		$keyword = $request->keyword;
 
		$posts = Post::orderBy('updated_at', 'DESC')
        ->where('title','like',"%".$keyword."%")
		->paginate();
 
		return $posts;
 
	}

    public function Categories(Request $request)
	{
		$keyword = $request->keyword;
        $keyword = explode(",", $keyword);
        
		$posts = Post::orderBy('updated_at', 'DESC')
        ->where(function($query) use ($keyword){
            foreach ($keyword as $keyword) {
                $query->orWhere('categories', 'LIKE', '%'.$keyword.'%');
            }
        })
		->paginate(12);
 
		return $posts;
 
	}

    public function Listcategories(Request $request)
	{
        return PostCategories::orderBy('updated_at','desc')->get();
 
	}

    public function Listchannels(Request $request)
	{
        return PostChannels::orderBy('updated_at','desc')->get();
 
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

    public function getloved(Request $request)
    {
        $id_posts = $request->posts;
        $id_users = $request->users;
        $getloved = Post::select('posts.*', 'post_seos.*')
        ->join('post_seos', 'posts.videoId', '=', 'post_seos.id_posts')
        ->where('post_seos.id_users','=', $id_users)
        ->where('post_seos.likes', '=', 2)
        ->orderBy('post_seos.id','desc')
        ->paginate(12);

        return $getloved;
    }

    public function getdongeng(Request $request)
    {
        $slug = $request->slug;
        $getdongeng = Post::where('slug', $slug)->get();

        return $getdongeng;
    }

    public function delloved(Request $request)
    {
        $id_posts = $request->posts;
        $id_users = $request->users;
        $delloved = PostSeo::where('post_seos.id_users','=', $id_users)
        ->where('post_seos.id_posts', '=', $id_posts)
        ->delete();

        return $delloved;
    }


    public function deluserhistory(Request $request){
        $id_users = $request->users;
        $delloved = PostSeo::where('post_seos.id_users','=', $id_users)
        ->delete();

        return $delloved;
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
        ->paginate(12);
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
    public function scopeUpdateDescending($query)
    {
        return $query->orderBy('updated_at','DESC');
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
