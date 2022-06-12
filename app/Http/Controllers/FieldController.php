<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Support\Str;
use App\Http\Resources\FieldResource;
use App\Http\Requests\StoreFieldRequest;
use App\Http\Requests\UpdateFieldRequest;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            "message" => "Fields Successfully retrieved.",
            "fields" => FieldResource::collection(Field::all())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFieldRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFieldRequest $request)
    {
        $field = Field::create([
            "title" => $request->title,
            "type" => $request->type,
            "key" => Str::slug($request->title, '_')
        ]);

        return response()->json([
            "message" => "Field successfully created.",
            "field" => new FieldResource($field)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function show(Field $field)
    {
        return response()->json([
            "message" => "Field successfully retrieved.",
            "field" => new FieldResource($field)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFieldRequest  $request
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFieldRequest $request, Field $field)
    {
        $field->update([
            "title" => $request->title,
            "type" => $request->type,
            "key" => Str::slug($request->title, '_')
        ]);

        return response()->json([
            "message" => "Field successfully updated.",
            "field" => new FieldResource($field->fresh())
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy(Field $field)
    {
        $field->delete();

        return response()->json([
            "message" => "Field successfully deleted.",
        ], 204);
    }
}
