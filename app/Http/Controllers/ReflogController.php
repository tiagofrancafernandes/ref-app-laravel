<?php

namespace App\Http\Controllers;

use App\Models\Reflog;
use Illuminate\Http\Request;

class ReflogController extends Controller
{
    /**
     * Create a new reference in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function new(Request $request)
    {
        $REDIR_TO_AFTER_STORE   = env('REDIR_TO_AFTER_STORE', 'https://laravel.com/docs');
        $ref                    = $request->input('ref');
        $title                  = $request->input('title');
        $note                   = $request->input('note');

        if($ref || $title)
        {
            $data['ref']        = $ref   && strlen($ref)   <= 100  ? $ref      : null;
            $data['title']      = $title && strlen($title) <= 100  ? $title    : null;
            $data['note']       = $note  && strlen($note)  <= 100  ? $note     : null;

            if($data['ref'])
            {
                $reflog = Reflog::where('ref', $data['ref'])->first();

                if($reflog)
                {
                    $ref_count          = $reflog->ref_count;
                    $data['ref_count']  = ++$ref_count;
                    $reflog->update($data);
                }
                else
                    Reflog::create($data);

            }else{
                Reflog::create($data);
            }
        }

        return redirect($REDIR_TO_AFTER_STORE);
    }

    /**
     * Display a listing of the refs.
     *
     * @return \Illuminate\Http\Response
     */
    public function count()
    {
        $refs = Reflog::orderBy('id', 'desc')->paginate(30);

        return view('count', compact(['refs']));
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
        //
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
     * @param  \App\Models\Reflog  $reflog
     * @return \Illuminate\Http\Response
     */
    public function show(Reflog $reflog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reflog  $reflog
     * @return \Illuminate\Http\Response
     */
    public function edit(Reflog $reflog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reflog  $reflog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reflog $reflog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reflog  $reflog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reflog $reflog)
    {
        //
    }
}
