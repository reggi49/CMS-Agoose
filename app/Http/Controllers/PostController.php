<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Post;
use Alaouy\Youtube\Facades\Youtube;
use DB;

class PostController extends Controller
{
    public function index()
    {
        /// mengambil data terakhir dan pagination 5 list
        $posts = Post::latest()->paginate(20);
        // $video = Youtube::listChannelVideos('UCaMrqakJglh9VQItR50pQwA',1,10);
        //$video = Youtube::getPlaylistItemsByPlaylistId('PL5aOusud598n40yeE5rV9peFuiVDSyKJT');
        // dd($video);
        // $params = [
        //     'channelId'     => 'UCaMrqakJglh9VQItR50pQwA',
        //     'type'          => 'video',
        //     'part'          => 'id, snippet',
        //     'maxResults'    => 1
        // ];

        // $search = Youtube::searchAdvanced($params, true);

        // print("<pre>");
        // print_r($search); // First page results
        // print("</pre>");

        // // Check if we have a pageToken
        // if (isset($search['info']['nextPageToken'])) {
        //     $params['pageToken'] = $search['info']['nextPageToken'];
        // }
        // // Make another call and repeat
        // $search2 = Youtube::searchAdvanced($params, true);

        // echo"page2";
        // print("<pre>");
        // print_r($search2); // Second page results
        // print("</pre>");

        // // Check if we have a pageToken
        // if (isset($search2['info']['nextPageToken'])) {
        //     $params['pageToken'] = $search2['info']['nextPageToken'];
        // }
        // $search3 = Youtube::searchAdvanced($params, true);
        // echo"page3";
        // print("<pre>");
        // print_r($search3); // Second page results
        // print("</pre>");

        // // Check if we have a pageToken
        // if (isset($search3['info']['nextPageToken'])) {
        //     $params['pageToken'] = $search3['info']['nextPageToken'];
        // }
        // $search4 = Youtube::searchAdvanced($params, true);

        // // print("<pre>");
        // // print_r($search4); // Second page results
        // // print("</pre>");

        // // Check if we have a pageToken
        // if (isset($search4['info']['nextPageToken'])) {
        //     $params['pageToken'] = $search4['info']['nextPageToken'];
        // }
        // $search5 = Youtube::searchAdvanced($params, true);

        // // print("<pre>");
        // // print_r($search5); // Second page results
        // // print("</pre>");

        // // Check if we have a pageToken
        // if (isset($search5['info']['nextPageToken'])) {
        //     $params['pageToken'] = $search5['info']['nextPageToken'];
        // }
        // $search6 = Youtube::searchAdvanced($params, true);

        // // print("<pre>");
        // // print_r($search6); // Second page results
        // // print("</pre>");

        // // Check if we have a pageToken
        // if (isset($search6['info']['nextPageToken'])) {
        //     $params['pageToken'] = $search6['info']['nextPageToken'];
        // }
        // $search7 = Youtube::searchAdvanced($params, true);

        // // print("<pre>");
        // // print_r($search7); // Second page results
        // // print("</pre>");

        // if (isset($search7['info']['nextPageToken'])) {
        //     $params['pageToken'] = $search7['info']['nextPageToken'];
        // }
        // $search8 = Youtube::searchAdvanced($params, true);
        // print("<pre>");
        // print_r($search8); // Second page results
        // print("</pre>");

        // $jsonarray =json_decode(json_encode($search),TRUE); // $b=your json array
        //     foreach ($jsonarray as $key => $results) 
        //     {
        //         foreach ($results as $a => $b) 
        //         {
        //             $qry=DB::insert('insert into posts(videoId,channelId,channelTitle,title,description,published,thumbnail)values(?,?,?,?,?,?,?)',[$b['id']['videoId'],$b['snippet']['channelId'],$b['snippet']['channelTitle'],$b['snippet']['title'],$b['snippet']['description'],'1',$b['snippet']['thumbnails']['high']['url']]); //index name will be paper_id,question_no etc
        //             print('video insert sukes'.$b['snippet']['title']);
        //         }
        //     }
        // $jsonarray2 =json_decode(json_encode($search2),TRUE); // $b=your json array
        //     foreach ($jsonarray2 as $key => $results) 
        //     {
        //         foreach ($results as $a => $b) 
        //         {
        //             $qry=DB::insert('insert into posts(videoId,channelId,channelTitle,title,description,published,thumbnail)values(?,?,?,?,?,?,?)',[$b['id']['videoId'],$b['snippet']['channelId'],$b['snippet']['channelTitle'],$b['snippet']['title'],$b['snippet']['description'],'1',$b['snippet']['thumbnails']['high']['url']]); //index name will be paper_id,question_no etc
        //             print('video insert sukes'.$b['snippet']['title']);
        //         }
        //     }
        // $jsonarray3 =json_decode(json_encode($search3),TRUE); // $b=your json array
        //     foreach ($jsonarray3 as $key => $results) 
        //     {
        //         foreach ($results as $a => $b) 
        //         {
        //             $qry=DB::insert('insert into posts(videoId,channelId,channelTitle,title,description,published,thumbnail)values(?,?,?,?,?,?,?)',[$b['id']['videoId'],$b['snippet']['channelId'],$b['snippet']['channelTitle'],$b['snippet']['title'],$b['snippet']['description'],'1',$b['snippet']['thumbnails']['high']['url']]); //index name will be paper_id,question_no etc
        //             print('video insert sukes'.$b['snippet']['title']);
        //         }
        //     }
        // $jsonarray4 =json_decode(json_encode($search4),TRUE); // $b=your json array
        //     foreach ($jsonarray4 as $key => $results) 
        //     {
        //         foreach ($results as $a => $b) 
        //         {
        //             $qry=DB::insert('insert into posts(videoId,channelId,channelTitle,title,description,published,thumbnail)values(?,?,?,?,?,?,?)',[$b['id']['videoId'],$b['snippet']['channelId'],$b['snippet']['channelTitle'],$b['snippet']['title'],$b['snippet']['description'],'1',$b['snippet']['thumbnails']['high']['url']]); //index name will be paper_id,question_no etc
        //             print('video insert sukes'.$b['snippet']['title']);
        //         }
        //     }
        // $jsonarray5 =json_decode(json_encode($search5),TRUE); // $b=your json array
        //     foreach ($jsonarray5 as $key => $results) 
        //     {
        //         foreach ($results as $a => $b) 
        //         {
        //             $qry=DB::insert('insert into posts(videoId,channelId,channelTitle,title,description,published,thumbnail)values(?,?,?,?,?,?,?)',[$b['id']['videoId'],$b['snippet']['channelId'],$b['snippet']['channelTitle'],$b['snippet']['title'],$b['snippet']['description'],'1',$b['snippet']['thumbnails']['high']['url']]); //index name will be paper_id,question_no etc
        //             print('video insert sukes'.$b['snippet']['title']);
        //         }
        //     }
        // $jsonarray6 =json_decode(json_encode($search6),TRUE); // $b=your json array
        //     foreach ($jsonarray6 as $key => $results) 
        //     {
        //         foreach ($results as $a => $b) 
        //         {
        //             $qry=DB::insert('insert into posts(videoId,channelId,channelTitle,title,description,published,thumbnail)values(?,?,?,?,?,?,?)',[$b['id']['videoId'],$b['snippet']['channelId'],$b['snippet']['channelTitle'],$b['snippet']['title'],$b['snippet']['description'],'1',$b['snippet']['thumbnails']['high']['url']]); //index name will be paper_id,question_no etc
        //             print('video insert sukes'.$b['snippet']['title']);
        //         }
        //     }
        // $jsonarray7 =json_decode(json_encode($search7),TRUE); // $b=your json array
        //     foreach ($jsonarray7 as $key => $results) 
        //     {
        //         foreach ($results as $a => $b) 
        //         {
        //             $qry=DB::insert('insert into posts(videoId,channelId,channelTitle,title,description,published,thumbnail)values(?,?,?,?,?,?,?)',[$b['id']['videoId'],$b['snippet']['channelId'],$b['snippet']['channelTitle'],$b['snippet']['title'],$b['snippet']['description'],'1',$b['snippet']['thumbnails']['high']['url']]); //index name will be paper_id,question_no etc
        //             print('video insert sukes'.$b['snippet']['title']);
        //         }
        //     }
        // $jsonarray8 =json_decode(json_encode($search8),TRUE); // $b=your json array
        //     foreach ($jsonarray8 as $key => $results) 
        //     {
        //         foreach ($results as $a => $b) 
        //         {
        //             $qry=DB::insert('insert into posts(videoId,channelId,channelTitle,title,description,published,thumbnail)values(?,?,?,?,?,?,?)',[$b['id']['videoId'],$b['snippet']['channelId'],$b['snippet']['channelTitle'],$b['snippet']['title'],$b['snippet']['description'],'1',$b['snippet']['thumbnails']['high']['url']]); //index name will be paper_id,question_no etc
        //             print('video insert sukes'.$b['snippet']['title']);
        //         }
        //     }

        /// mengirimkan variabel $posts ke halaman views posts/index.blade.php
        /// include dengan number index
        return view('posts.index',compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    public function create()
    {
        // get Channelid With Channel Title
        $post['channels'] = DB::table('post_channels')->get();
        $post['categories'] = DB::table('post_categories')->get();
        //dd($post);
        return view('posts.create',compact('post'));
    }
  
    public function store(Request $request)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
            'videoId' => 'required',
            // 'channelId' => 'required',
            'channelTitle' => 'required',
            'title' => 'required',
            'categories' => 'required',
            'published' => 'required',
            'description' => 'required',
            'thumbnail' => 'required',
            'background' => 'required',
        ]);
         
        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama
        Post::create($request->all());
         
        /// redirect jika sukses menyimpan data
        return redirect()->route('posts.index')
                        ->with('success','Post created successfully.');
    }

    public function imgupload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move(public_path('images'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image successfully uploaded'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }

    public function show(Post $post)
    {
        /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        /// href="{{ route('posts.show',$post->id) }}
        return view('posts.show',compact('post'));
    }
  
    public function edit(Post $post)
    {
        /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        /// href="{{ route('posts.edit',$post->id) }}
        return view('posts.edit',compact('post'));
    }
  
    public function update(Request $request, Post $post)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        // dd($request);die;
        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        $post->update($request->all());
         
        /// setelah berhasil mengubah data
        return redirect()->route('posts.index')
            ->with('success','Post updated successfully');
    }
  
    public function destroy(Post $post)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $post->delete();
  
        return redirect()->route('posts.index')
            ->with('success','Post deleted successfully');
    }
}