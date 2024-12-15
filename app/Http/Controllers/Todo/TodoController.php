<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {
        $max_data = 5;
        
        $user = Auth::user(); 
        $data = Todo::all();

        if ($user->role) {
            $data = Todo::where('role', $user->role)->paginate($max_data);
        }elseif (request('search')){
            $data = Todo::where('task','like','%'.request('search').'%')->paginate($max_data)->withQueryString();
        }else{
            $data = Todo::orderBy('task','asc')->paginate($max_data);
        }
        return view('todo.user', compact('data','user'));
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
        $role = request()->segment(2);
        
        $request->validate([    
            'task' => 'required|min:3|max:20',
            'role' => 'required|integer',
        ],[
            'task.required'=>'Isian Wajib Diisi',
            'task.min'=>'Isian Minimal 3 karakter',
            'task.max'=>'Isian Maksimal 20 karakter',
        ]);

        $data = [
            'task'=> $request->input('task'),
            'role' => $role,
        ];

        Todo::create($data);
        return redirect()->route('todo'.['role' => $role])->with('success','Task Berhasil Ditambahkan!');
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

    /**
     * Update the specified resource in storage.
     */
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
        return redirect()->route('todo')->with('success','Task telah terselesaikan');
    }

    public function updateAdmin(Request $request, string $id) {
        $request->validate([
                    'task' => 'required|min:3|max:20'
                ],[
                    'task.required'=>'Isian Wajib Diisi',
                    'task.min'=>'Isian Minimal 3 karakter',
                    'task.max'=>'Isian Maksimal 20 karakter',
                ]);

        $todo = Todo::findOrFail($id);

        $data = [
            'task' => $request->input('task'),
            'is_done' => $todo->is_done,
        ];

        Todo::where('id', $id)->update($data);
        return redirect()->route('todo')->with('succes', 'Task berhasil dibuat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Todo::where('id',$id)->delete();
        return redirect()->route('todo')->with('success','Berhasil menghapus');
    }

     public function showTasksByRole($role) {

        // Mengambil data Todo berdasarkan role
        $data = Todo::where('role', $role)->paginate(10); 
        $user = Auth::user(); 

        return view('todo.app', compact('data', 'role','user'));
    }

    public function storeWithRole(Request $request) {
        $role = request()->segment(2);
        
        // Validasi input
        $request->validate([
            'task' => 'required|min:3|max:20',
        ], [
            'task.required' => 'Isian Wajib Diisi',
            'task.min' => 'Isian Minimal 3 karakter',
            'task.max' => 'Isian Maksimal 20 karakter',
        ]);
    
        // Menyimpan data Todo
        $data = [
            'task' => $request->input('task'),
            'role' => $role, 
        ];
    
        Todo::create($data);
    
        return redirect()->route('todo.role', ['role' => $role])->with('success', 'Task Berhasil Ditambahkan!');
    }
}
