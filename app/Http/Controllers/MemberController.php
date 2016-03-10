<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests\MemberRequest;
use App\Member;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Member::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // https://laravel.com/docs/5.1/validation#quick-writing-the-validation-logic
        $validation = Validator::make($request->all(), array(
            'name'      => 'required|unique:members|max:100',
            'address'   => 'required|max:300',
            'age'       => 'required|integer|digits_between:1,2'
        ));
        $input = Input::all();
        $member = Member::create($input);
        if ($request->file()) {
            $photo = $request->file('photo');
            $filename = $request->file('photo')->getClientOriginalName();
            $path = public_path('up/' . time(). $filename);
            $size = '200,200';
            Image::make($photo->getRealPath())->resize(intval($size), null, function ($contstraint) {
                $contstraint->aspectRatio();
            })->save($path);
            $member->photo = $filename;
        }

        if ($member->save()) {
            return redirect()->action('MemberController@index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return Member::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */

    public function update(Request $request, $id)
    {
        $mem = Member::find($id);

        $mem->name      = $request->input('name');
        $mem->address   = $request->input('address');
        $mem->age       = $request->input('age');
    
        if ($request->file()) {
            $photo = $request->file('photo');
            $filename = $request->file('photo')->getClientOriginalName();
            $path = public_path('up/' . time(). $filename);
            $size = '200,200';
            Image::make($photo->getRealPath())->resize(intval($size), null, function ($contstraint) {
                $contstraint->aspectRatio();
            })->save($path);
            $mem->photo = $filename;
        }
        if ($mem->save()) {
            return redirect()->action('MemberController@index');
        }
        return "fail";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        return Member::destroy($id);
    }
}
