<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminTodoController extends Controller
{
    public function updateAdmin(Request $request, string $id)
    {
        $request->validate([
            'task' => 'required|min:3|max:100',
            'is_done' => 'required|boolean',
            'admin_feedback' => 'nullable|string'
        ], [
            'task.required' => 'Isian Wajib Diisi',
            'task.min' => 'Isian Minimal 3 karakter',
            'task.max' => 'Isian Maksimal 50 karakter',
        ]);
    
        $todo = Todo::findOrFail($id);
    
        $todo->update([
            'task' => $request->input('task'),
            'is_done' => $request->input('is_done'),
            'admin_feedback' => $request->input('admin_feedback'),
        ]);
    
        $previousUrl = $request->headers->get('referer');
    
        return $previousUrl
            ? redirect($previousUrl)->with('success', 'Task berhasil diperbarui.')
            : redirect()->route('admin.todo.role', ['role' => $todo->role])->with('success', 'Task berhasil diperbarui.');
    }
     

    public function destroy(Request $request, string $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        $previousUrl = $request->headers->get('referer');

        return $previousUrl
            ? redirect($previousUrl)->with('success', 'Task berhasil dihapus.')
            : redirect()->route('admin.todo.role', ['role' => Auth::user()->role])->with('success', 'Task berhasil dihapus.');
    }


    public function showTasksByRole($user_id) 
    {
        $data = Todo::where('user_id', $user_id)->orderby('updated_at', 'desc')->paginate(10); 
        $user = Auth::user(); 

        return view('todo.app', compact('data', 'user_id','user'));
    }

    public function storeWithRole(Request $request) 
    {
        $user_id = request()->segment(2);
        
        $request->validate([
            'task' => 'required|min:3|max:50',
        ], [
            'task.required' => 'Isian Wajib Diisi',
            'task.min' => 'Isian Minimal 3 karakter',
            'task.max' => 'Isian Maksimal 50 karakter',
        ]);
    
        $data = [
            'task' => $request->input('task'),
            'user_id' => $user_id, 
        ];
    
        Todo::create($data);
    
        return redirect()->route('admin.todo.role', ['user_id' => $user_id])->with('success', 'Task Berhasil Diubah!');
    }
}







