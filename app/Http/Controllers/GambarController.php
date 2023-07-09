<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GambarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = $request->input('cari');

        if ($request->has('clear')) {
            // Clear the search query
            $query = null;
        }
        $gambars = Gambar::when($query, function ($query) use ($request) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->input('cari') . '%');
            });
        })
            ->orderBy('id', 'desc')
            ->paginate(6)
            ->appends(['cari' => $query]);
        return view('admin.gambar.index', compact('gambars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.gambar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name'     => 'required',
            'path'     => 'required|image|mimes:png,jpg,jpeg',
        ]);

        //upload image
        $image = $request->file('path');
        $image->storeAs('public/img', $image->hashName());

        $images = Gambar::create([
            'name'     => $request->name,
            'path'     => $image->hashName(),
        ]);

        if ($images) {
            //redirect dengan pesan sukses
            return redirect()->route('gambar.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('gambar.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
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
    public function edit(Gambar $gambar)
    {
        //
        return view('admin.gambar.edit', compact('gambar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gambar $gambar)
    {
        //
        $this->validate($request, [
            'name'     => 'required',
        ]);

        //get data Blog by ID
        $gambar = Gambar::findOrFail($gambar->id);

        if ($request->file('path') == "") {

            $gambar->update([
                'name'     => $request->name
            ]);
        } else {

            //hapus old image
            Storage::disk('local')->delete('public/img/' . $gambar->path);

            //upload new image
            $image = $request->file('path');
            $image->storeAs('public/img', $image->hashName());

            $gambar->update([
                'path'     => $image->hashName(),
                'name'     => $request->name
            ]);
        }

        if ($gambar) {
            //redirect dengan pesan sukses
            return redirect()->route('gambar.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('gambar.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $gambar = Gambar::findOrFail($id);
        Storage::disk('local')->delete('public/img/' . $gambar->image);
        $gambar->delete();

        if ($gambar) {
            //redirect dengan pesan sukses
            return redirect()->route('gambar.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('gambar.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
