<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Album;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums=Album::all();
        return view('albums.index',compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input['title']=$request->title;
        if(!empty($request->title)){
            $Album=Album::create($input);
           return redirect()->route('albums.index');
        }else{
            return redirect()->back()->withErrors(['msg' => 'Album cant be null']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        $photos=$album->getMedia();
        return view('albums.upload',compact('album','photos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        // $albums=albuum::find($id);
        return view('albums.edit',compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        if(!empty($request->title)){
            $album->update([
                "title"=>$request->title
            ]);
           return redirect()->route('albums.index');
        }else{
            return redirect()->back()->withErrors(['msg' => 'Album cant be null']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $albums=Album::all();
        return view('albums.delete',compact('album','albums'));
    }

    public function upload(Request $request,Album $album)
    {
   if($request->has("image")){
       $album->addMedia($request->image)->usingName($request->title)->toMediaCollection();
       return redirect()->back();  
   }
      else{
        return redirect()->back()->withErrors(['msg' => 'Error for uploading image!!']);
      }
    }
    public function delete(Album $album)
    {
        $album->delete();
        $album->clearMediaCollection('images');
        return redirect()->route('albums.index');
    }

    public function move(Request $request,Album $album)
    {
        $media = $album->getMedia()->first();
        $media->update([
            "model_id"=>$request->album
        ]);
        return redirect()->route('albums.index');
    }
}
