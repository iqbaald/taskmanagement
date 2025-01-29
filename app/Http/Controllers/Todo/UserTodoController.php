<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTodoController extends Controller
{
    public function index()
    {
        $max_data = 10;

        $user = Auth::user();

        $query = Todo::where('role', $user->role);

        if (request('search')) {
            $searchTerm = request()->input('search');
            $query->where('task', 'like', '%' . $searchTerm . '%');
        }

        $data = $query->orderBy('task', 'asc')->paginate($max_data)->withQueryString();

            return view('todo.user', compact('data', 'user'));  
    }   

    public function search()
    {
        $searchTerm = request()->input('search');

        $data = Todo::where('task', 'like', '%' . $searchTerm . '%')->paginate(10);

        return view('todo.user', compact('data'));
    }

    private function processProductName($name)
    {
        $words = explode(' ', $name);
        $firstTwoWords = array_slice($words, 0, 2);
        $processedName = implode('-', $firstTwoWords);
        return strtolower($processedName);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_comment' => 'required|string|min:5',
            'proof_file_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $todo = Todo::findOrFail($id);
        $fileName = null;

        if ($request->hasFile('proof_file_path')) {
            $processedName = $this->processProductName($request->user_comment);
            $image = $request->file('proof_file_path');
            $fileExtension = $image->getClientOriginalExtension();
            $fileName = $processedName . '-' . rand(100, 999) . '.' . $fileExtension;

            $location = public_path('assets/img/todo');
            $image->move($location, $fileName);

            if ($request->proof_file_path && file_exists(public_path('img/todo/' . $request->proof_file_path))) {
                unlink(public_path('img/todo/' . $request->proof_file_path));
            }
        }

        $todo->user_comment = $request->user_comment;
        $todo->proof_file_path = $fileName;

        $todo->save();

        return redirect()->route('todo')->with('success', 'Task berhasil diperbarui');
    }
}
