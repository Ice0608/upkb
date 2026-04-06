<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // Display the contact form page
    public function show()
    {
        return view('hubungi');
    }

    // Store message from contact form
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'emel' => 'required|email|max:255',
            'perkara' => 'required|string|max:255',
            'mesej' => 'required|string',
        ]);

        Message::create($validated);

        return redirect()->route('hubungi')->with('success', 'Terima kasih! Mesej anda telah dihantar. Kami akan hubungi anda segera.');
    }

    // Admin: Display all messages in a table
    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.messages', compact('messages'));
    }

    // Admin: View single message details
    public function showMessage($id)
    {
        $message = Message::findOrFail($id);
        return view('admin.message-detail', compact('message'));
    }

    // Admin: Delete a message
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.messages')->with('success', 'Mesej telah dipadam.');
    }

    // Admin: Update comment on message
    public function updateComment(Request $request, $id)
    {
        $validated = $request->validate([
            'comment' => 'required|string',
        ]);

        $message = Message::findOrFail($id);
        $message->update($validated);

        return redirect()->route('admin.message-detail', $id)->with('success', 'Nota telah disimpan.');
    }
}
