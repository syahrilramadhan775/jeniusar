<?php

namespace App\Http\Controllers;

use App\Models\Licence;
use Dotenv\Parser\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Illuminate\Support\Str;

class VerficationCodeCRUD extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Licence::with('users');

        return Inertia::render('License/Show', ['licenses' => $data->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('License/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hasAuto = !$request->manual;


        // Give Form Validation If The Mode Is Auto
        if ($request->manual)
            Validator::make($request->all(), ['licence' => 'required|min:12|max:12|unique:licence'])
                ->validate();

        $record = [
            'licence' => Str::lower($request->licence),
            'user_id' => null,
        ];
        // jika kode tidak dibuat manual
        if ($hasAuto)
            $record['licence'] = $this->generateCode();



        $license = Licence::create($record);
        // return Inertia::render('License/Create', ['data' => $license]);
        return redirect()->route('license.index');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete 
        Licence::destroy($id);

        return redirect()->route('license.index');
    }

    private function generateCode($batch = 1, $round = 3)
    {
        // One Batch
        if ($batch <= 1) {
            $randomCode = Str::lower(Str::random(4 * $round));

            // Recursive Until Unique
            return $this->checkUnique($randomCode)
                ? $randomCode
                : $this->generateCode();
        }
        // Many Batch

    }
    private function checkUnique($code)
    {
        return !(Licence::where('licence', $code)->exists());
    }
}
