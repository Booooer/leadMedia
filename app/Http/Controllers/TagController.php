<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Jobs\DestroyTagJob;
use App\Jobs\StoreTagJob;
use App\Jobs\UpdateTagJob;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Services\Tag\Service;

class TagController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagRequest $request, Tag $tag)
    {
        // $this->service->store($request, $tag);
        $this->dispatch(new StoreTagJob($request->name));

        return redirect()->route('profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTagRequest $request, Tag $tag)
    {
        // $this->service->update($request,$tag);
        $this->dispatch(new UpdateTagJob($tag, $request->name));

        return redirect()->route('profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $this->dispatch(new DestroyTagJob($tag));

        return back();
    }
}
