<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Document;
use App\Models\DocumentData;
use Image;

class DocumentDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents_data = DocumentData::all();
        return view('document_data.index', compact('documents_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documents = Document::all();
        return view('document_data.create', compact('documents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->validate($request,
                [
                    'document_id'       => 'required|unique:document_data',    
                    'logo'              => 'required',
                    'slogan'            => 'required',
                    'image'             => 'required',
                    'agreements_section_1'    => 'required',
                    'agreements_section_2'    => 'required',
                ],
                [
                    'document_id.required'      => 'Selecciona el documento que utiliará esta información',
                    'document_id.unique'        => 'Ya existen datos para este documento',
                    'slogan.required'           => 'El slogan es necesario para el formato',
                    'agreements_section_1.required'   => 'Primer Nota en el pie de página',
                    'agreements_section_2.required'   => 'Primer Nota en el pie de página',
                ]
            );
    
            $upload_url = 'uploads/document/';
            $logo = $request->file('logo');
            $logo_name = hexdec(uniqid()).'.'.$logo->getClientOriginalExtension();
            Image::make($logo)->resize(738,431)->save($upload_url.$logo_name);
            $logo_url = $upload_url.$logo_name;
    
            $image = $request->file('image');
            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(465,464)->save($upload_url.$image_name);
            $image_url = $upload_url.$image_name;
            
            DocumentData::insert(
                [
                    'document_id'       => $request->document_id, 
                    'logo'              => $logo_url,
                    'slogan'            => $request->slogan,
                    'image'             => $image_url,
                    'agreements_section_1'    => $request->agreements_section_1,
                    'agreements_section_2'    => $request->agreements_section_2,
                    'created_at'        => Carbon::now(),
                ]
            );
    
            $notification = array(
                'message' => 'Las Imagenes e Información se guardaron correctamente',
                'alert-type' => 'success'
            );
    
            return back()->with($notification);
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
        //
    }
}
