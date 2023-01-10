<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MusicController extends Controller
{

    public function allMusic()
    {
        $musics = Music::all();
        return response()->json([
        "success" => true,
        "message" => "Music List",
        "data" => $musics
        ]);
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
        'name' => 'required',
        'artist' => 'required',
        'category'=>'required',
        'length'=>'required',
        'directions'=>'required'
        ]);
        if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());
        }
        $musics = Music::create($input);
        return response()->json([
        "success" => true,
        "message" => "Musics created successfully.",
        "data" => $musics
        ]);
    }
    public function show($id)
    {
        $musics = Music::find($id);
        if (is_null($musics)) {
        return $this->sendError('Music not found.');
        }
        return response()->json([
        "success" => true,
        "message" => "Music retrieved successfully.",
        "data" => $musics
        ]);
    }
    public function update(Request $request, Music $music)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'artist' => 'required',
            'category'=>'required',
            'length'=>'required',
            'directions'=>'required'
        ]);
        if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());
        }
        $music->name = $input['name'];
        $music->artist = $input['artist'];
        $music->category = $input['category'];
        $music->length = $input['length'];
        $music->directions = $input['directions'];
        $music->save();
        return response()->json([
        "success" => true,
        "message" => "Music updated successfully.",
        "data" => $music
        ]);
   }
   public function destroy(Music $music )
    {
        $music->delete();
        return response()->json([
        "success" => true,
        "message" => "Music deleted successfully.",
        "data" => $music
        ]);
    }
}
