<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::where('category', 'pantai')->latest()->get();

        return view('admin.destinations.index', compact('destinations'));
    }

    public function create(Request $request)
    {
        $category = $request->query('category');

        return view('admin.destinations.create', compact('category'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'category' => 'required|string|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('destinations', 'public');
        }

        Destination::create($data);

        $redirect = $request->input('redirect', route('admin.destinations.index'));

        return redirect($redirect)->with('success', 'Destinasi berhasil ditambahkan.');
    }

    public function edit(Destination $destination)
    {
        return view('admin.destinations.edit', compact('destination'));
    }

    public function update(Request $request, Destination $destination)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'category' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($destination->image) {
                Storage::disk('public')->delete($destination->image);
            }
            $data['image'] = $request->file('image')->store('destinations', 'public');
        }

        $destination->update($data);

        $redirect = $request->input('redirect', route('admin.destinations.index'));

        return redirect($redirect)->with('success', 'Destinasi berhasil diperbarui.');
    }

    public function destroy(Destination $destination)
    {
        if ($destination->image) {
            Storage::disk('public')->delete($destination->image);
        }
        $destination->delete();

        return redirect()->route('admin.destinations.index')->with('success', 'Destinasi berhasil dihapus.');
    }

    public function showSubmitForm(Request $request)
    {
        $category = $request->query('category');

        return view('destinations.submit', compact('category'));
    }

    public function userStore(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'category' => 'required|string|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('destinations', 'public');
        }

        $data['status'] = 'pending';
        $data['submitted_by'] = Auth::id();
        $data['rating'] = 0;
        $data['reviews'] = 0;

        Destination::create($data);

        return redirect('/')->with('success', 'Usulan destinasi berhasil dikirim! Menunggu verifikasi admin.');
    }

    public function hillWaterfall()
    {
        $destinations = Destination::whereIn('category', ['bukit', 'air terjun'])->latest()->get();

        return view('admin.destinations.index', compact('destinations'));
    }

    public function approve(Destination $destination)
    {
        $destination->update(['status' => 'approved']);

        return redirect()->back()->with('success', 'Destinasi "'.$destination->title.'" berhasil disetujui dan sekarang tampil di website.');
    }

    public function reject(Destination $destination)
    {
        $destination->update(['status' => 'rejected']);

        return redirect()->back()->with('success', 'Destinasi "'.$destination->title.'" ditolak.');
    }
}
