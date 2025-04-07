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
        $query = Todo::where('user_id', $user->id);

        if (request('status') && request('status') != 'all') {
            if (request('status') == 'done') {
                $query->where('is_done', 1);
            } else {
                $query->where('is_done', 0);
            }
        }

        if (request('year') && request('year') != 'all') {
            $query->whereYear('created_at', request('year'));
        }

        if (request('date')) {
            $query->whereDate('created_at', request('date'));
        }

        if (request('search')) {
            $searchTerm = request()->input('search');
            $query->where('task', 'like', '%' . $searchTerm . '%');
        }

        $data = $query->orderBy('updated_at', 'desc')->paginate($max_data)->withQueryString();

        $years = Todo::selectRaw('YEAR(created_at) as year')->distinct()->pluck('year');

        return view('todo.user', compact('data', 'user', 'years'));
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
