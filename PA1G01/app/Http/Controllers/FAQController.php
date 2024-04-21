<?php

namespace App\Http\Controllers;

use App\Http\Requests\FAQRequest;
use App\Models\FAQ;

class FAQController extends Controller
{

    public function index()
    {
        $faq = FAQ::latest()->paginate(null);
        return view('admin.faq.index', compact('faq'));
    }


    public function create()
    {
        $faq = FAQ::all();
        return view('admin.faq.create', compact('faq'));
    }


    public function store(FAQRequest $request)
    {
        $validated = $request->validated();
        FAQ::create($validated);
        return redirect()->route('faq.index')->with('success', 'faq berhasil dibuat');
    }


    // public function show($id)
    // {
    //     //
    // }


    public function edit(FAQ $faq)
    {
        return view('admin.faq.edit', compact('faq'));
    }


    public function update(FAQRequest $request, $id)
    {
        $faq = FAQ::findOrFail($id);
        $faq->update([
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban,
        ]);
        return redirect()->route('faq.index')->with('success', 'Faq berhasil diupdate');
    }


    public function destroy($id)
    {
        $faq = FAQ::find($id);
        if ($faq){
            $faq->delete();
            return redirect()->route('faq.index')->with('success', 'Faq berhasil dihapus');

        }else{
            return redirect()->route('faq.index')->with('success', 'Faq tidak ditemukan');

        }
    }
}
