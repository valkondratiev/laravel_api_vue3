<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageUploadRequest;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'page' => 'required|integer'
        ]);

        $images = Image::paginate();

        return ImageResource::collection($images);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ImageUploadRequest $request)
    {
        $image_64 = $request->base64Image;
        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
        $replace = substr($image_64, 0, strpos($image_64, ',')+1);
        $image = str_replace($replace, '', $image_64);
        $image = str_replace(' ', '+', $image);

        $imageName = Str::random(10).'.'.$extension;
        $content = base64_decode($image);

        if($content === false) {
            return response()->json([
                'message' => 'Image upload fail. Invalid image content.'
            ], 400);
        }

        $path = 'public/images/' . $imageName;
        Storage::put($path, $content);

        $image = new Image();
        $image->path = 'storage/images/'.$imageName;
        $image->lat = $request->lat;
        $image->lng = $request->lng;
        $image->date = Carbon::createFromTimestamp((int) $request->date);
        $image->user_id = auth('sanctum')->user()->id;

        $image->save();

        return response()->json([
            "id" => $image->id,
            "url" => url($image->path),
            "date" => $image->date->timestamp,
            "lat" => $image->lat,
            "lng" => $image->lng
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function destroy(Image $image)
    {
        $image->delete();

        if(File::exists(public_path($image->path))) {
            File::delete(public_path($image->path));
        }

        return response()->noContent();
    }
}
