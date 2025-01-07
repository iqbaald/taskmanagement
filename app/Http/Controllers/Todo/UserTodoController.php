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

    public function update(Request $request, string $id)
    {
        $request->validate([
            'is_done' => 'required|boolean'
        ]);

        $todo = Todo::findOrFail($id);

        $data = [
            'task' => $todo->task,
            'is_done'=> $request->input('is_done'),
        ];

        Todo::where('id',$id)->update($data);
        return redirect()->route('todo')->with('success', 'Task berhasil diperbarui');
    }
}
