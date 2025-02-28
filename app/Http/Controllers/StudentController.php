<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mengambil input pencarian
        $search = $request->input('search');
    
        // Query pencarian dengan relevansi
        $students = Student::when($search, function ($query) use ($search) {
            $query->where('nama', $search) // Jika nama persis cocok, prioritas tinggi
                ->orWhere('nama', 'LIKE', "%{$search}%")
                ->orWhere('alamat', 'LIKE', "%{$search}%")
                ->orWhere('no_hp', 'LIKE', "%{$search}%")
                ->orWhere('hobi', 'LIKE', "%{$search}%");
        })->orderByRaw("
            CASE 
                WHEN nama = ? THEN 3
                WHEN nama LIKE ? THEN 2
                WHEN alamat LIKE ? OR no_hp LIKE ? OR hobi LIKE ? THEN 1
                ELSE 0
            END DESC, id ASC
        ", [$search, "%{$search}%", "%{$search}%", "%{$search}%", "%{$search}%"])
        ->get();
    
        return view('students.index', compact('students'));
    }
    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input termasuk file foto
        $validated = $request->validate([
            'nis' => 'required|unique:aji_table',
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'hobi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi untuk file foto
        ]);
    
        // Proses upload file jika ada
        if ($request->hasFile('foto')) {
            // Simpan file ke storage (lokasi: storage/app/public/students)
            $path = $request->file('foto')->store('students', 'public');
            // Tambahkan path foto ke data yang akan disimpan
            $validated['foto'] = $path;
        }
    
        // Simpan data ke database
        Student::create($validated);
    
        // Redirect dengan pesan sukses
        return redirect()->route('students.index')->with('success', 'Data berhasil ditambahkan!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing t  he specified resource.
     */
    public function edit($id)
    {
        // Ambil data student berdasarkan ID
        $student = Student::find($id);
    
        // Jika student tidak ditemukan, redirect kembali dengan pesan error
        if (!$student) {
            return redirect()->route('students.index')->with('error', 'Siswa tidak ditemukan');
        }
    
        // Mengirim data siswa ke view untuk diedit
        return view('students.edit', compact('student'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
            // Validasi input
            $request->validate([
                'nis' => 'required|unique:aji_table,nis,' . $id,
                'nama' => 'required',
                'alamat' => 'required',
                'no_hp' => 'required',
                'jenis_kelamin' => 'required',
                'hobi' => 'required',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);
        
            // Cari data siswa
            $student = Student::find($id);
            if (!$student) {
                return redirect()->route('students.index')->with('error', 'Siswa tidak ditemukan');
            }
        
            // Update data kecuali foto
            $data = $request->only(['nis', 'nama', 'alamat', 'no_hp', 'jenis_kelamin', 'hobi']);
        
            // Update foto jika ada file yang diupload
            if ($request->hasFile('foto')) {
                // Hapus foto lama jika ada
                if ($student->foto && file_exists(storage_path('app/public/' . $student->foto))) {
                    unlink(storage_path('app/public/' . $student->foto));
                }
        
                // Simpan foto baru
                $data['foto'] = $request->file('foto')->store('fotos', 'public');
            }
        
            // Simpan data ke database
            $student->update($data);
        
            return redirect()->route('students.index')->with('success', 'Data berhasil diperbarui!');
        }
        
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student) //pemanggilan student dari models
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Data berhasil dihapus!');
    }
}
