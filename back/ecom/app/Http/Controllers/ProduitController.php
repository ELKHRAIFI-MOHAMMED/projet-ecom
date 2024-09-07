<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $list=Produit::all();
         return $list;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $image=$request->file('image');
            $file_name=time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public',$file_name);
            $new_product=Produit::create([
                'nom'=>$request->nom,
                'image'=>$file_name,
                'prix'=>$request->prix,
                'quantite'=>$request->quantite,
                'id_category'=>1
            ]);
            return $request->all();
        }
        return ';;;;;';

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    public function up_dtae_image(Request $request,$id){
        $produit=Produit::find($id);
        if($request->hasFile('image')){
            $disk='public';
            if(Storage::disk($disk)->exists($produit->image)){
                Storage::disk($disk)->delete($produit->image);
            }
            $image=$request->file('image');
            $file_name=time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public',$file_name);
            $produit->update([
                'nom'=>$request->nom,
                'image'=>$file_name,
                'prix'=>$request->prix,
                'quantite'=>$request->quantite,
                'id_category'=>$request->id_category
            ]);
            return $produit;

        }else{
            $produit->update([
                'nom'=>$request->nom,
                'prix'=>200,
                'quantite'=>200,
                'id_category'=>1
            ]);
            return $produit;

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //return $request->all();
        $produit=Produit::find($id);
        if($request->hasFile('image')){
            return 'ja fichi';
        }else{
            return 'ma ja walo';
        }
        //return $produit;
        if($request->hasFile('image')){
            $disk='public';
            if(Storage::disk($disk)->exists($produit->image)){
                Storage::disk($disk)->delete($produit->image);
            }
            $image=$request->file('image');
            $file_name=time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public',$file_name);
            $produit->update([
                'nom'=>$request->nom,
                'image'=>$file_name,
                'prix'=>$request->prix,
                'quantite'=>$request->quantite,
                'id_category'=>$request->id_category
            ]);
            return $produit;
        }
        $produit->update([
            'nom'=>$request->nom,
            'prix'=>200,
            'quantite'=>200,
            'id_category'=>1
        ]);
        return $produit;



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produit=Produit::findOrFail($id);
        $produit->delete();
        
    }
}
