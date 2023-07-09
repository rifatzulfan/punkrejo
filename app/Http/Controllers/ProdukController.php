<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $query = $request->input('cari');

        if ($request->has('clear')) {
            // Clear the search query
            $query = null;
        }
        $produks = Produk::when($query, function ($query) use ($request) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->input('cari') . '%');
            });
        })->orderBy('id', 'desc')
        ->paginate(6)
        ->appends(['cari' => $query]);
        return view('admin.produk.index',compact('produks'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.produk.create');
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
         $this->validate($request, [
            'name'     => 'required',
            'hari'     => 'required',
            'jam'     => 'required',
            'desc'     => 'required',
            'price'     => 'required',
            'path'     => 'required|image|mimes:png,jpg,jpeg',
        ]);

        //upload image
        $image = $request->file('path');
        $image->storeAs('public/img', $image->hashName());

        $produk = Produk::create([
            'name'     => $request->name,
            'hari'     => $request->hari,
            'jam'     => $request->jam,
            'desc'     => $request->desc,
            'price'     => $request->price,
            'path'     => $image->hashName(),
        ]);

        if ($produk) {
            //redirect dengan pesan sukses
            return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('produk.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
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
    public function edit(Produk $produk)
    {
        //
        return view('admin.produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        //
        $this->validate($request, [
            'name'     => 'required',
            'hari'     => 'required',
            'jam'     => 'required',
            'desc'     => 'required',
            'price'     => 'required',
            'path'     => 'nullable|image|mimes:png,jpg,jpeg',
        ]);

        //get data Blog by ID
        $produk = Produk::findOrFail($produk->id);

        if ($request->file('path') == "") {

            $produk->update([
                'name'     => $request->name,
                'hari'     => $request->hari,
                'jam'     => $request->jam,
                'desc'     => $request->desc,
                'price'     => $request->price,
            ]);
        } else {

            //hapus old image
            Storage::disk('local')->delete('public/img/' . $produk->path);

            //upload new image
            $image = $request->file('path');
            $image->storeAs('public/img', $image->hashName());

            $produk->update([
                'name'     => $request->name,
                'hari'     => $request->hari,
                'jam'     => $request->jam,
                'desc'     => $request->desc,
                'price'     => $request->price,
                'path'     => $image->hashName(),
            ]);
        }

        if ($produk) {
            //redirect dengan pesan sukses
            return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('produk.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
        $produk->delete();
        return redirect()->route('user.index')->with('success', 'User Sukses Dihapus');
    }
}
