<?php

namespace App\Http\Controllers;

use App\Enums\State;
use App\Models\Subscriber;
use App\Http\Requests\StoreSubscriberRequest;
use App\Http\Requests\UpdateSubscriberRequest;
use App\Http\Resources\SubscriberResource;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->limit ?? 100;
        $offset = $request->offset ?? 0;

        $query = Subscriber::query();

        if ($request->state) {
            $query->whereState($request->state);
        }

        $subscribers = $query->offset($offset)
                            ->limit($limit)
                            ->get();

        return response()->json([
            "message" => "Subscribers Successfully retrieved.",
            "subscribers" => SubscriberResource::collection($subscribers)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubscriberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubscriberRequest $request)
    {
        $subscriber = Subscriber::create([
            "name" => $request->name,
            "email" => $request->email,
            "state" => State::Active->value
        ]);

        $subscriber->fields()->create([
            'value' => $request->fields
        ]);

        return response()->json([
            "message" => "Subscriber successfully added.",
            "subscriber" => new SubscriberResource($subscriber)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $subscriber)
    {
        return response()->json([
            "message" => "Subscriber Successfully retrieved.",
            "subscriber" => new SubscriberResource($subscriber)
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubscriberRequest  $request
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubscriberRequest $request, Subscriber $subscriber)
    {
        $subscriber->update([
            "name" => $request->name,
            "email" => $request->email,
            "state" => $request->state
        ]);

        $subscriber->fields()->update([
            'value' => $request->fields
        ]);

        return response()->json([
            "message" => "Subscriber successfully updated.",
            "subscriber" => new SubscriberResource($subscriber)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();

        return response()->json([
            "message" => "Subscriber Successfully deleted.",
        ], 200);
    }
}
