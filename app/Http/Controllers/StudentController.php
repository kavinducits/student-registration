<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = Student::all();
        return view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('student.create');
    }
    // The login function is defined but not used as a route in web.php.
    // To make this function accessible via a URL, you need to define a route in your routes/web.php file like:
    // Route::get('/student/login', [StudentController::class, 'login'])->name('student.login');
    public function showLogin()
    {
        return view('student.login');
    }
    public function login(Request $request)
    {
        // Validate the request data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

       if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
        return redirect()->route('student.index');
        //$credentials['password'] = bcrypt($credentials['password']);
        /*
        $student = Student::where('email', $request->email)->first();

        // Attempt to authenticate the student
        if ($student && Hash::check($request->password, $student->password)) {
            // Authentication passed...
            $request->session()->regenerate();
            return redirect()->route('student.index')->with('success', 'Login successful!');
        }
else{
        // Authentication failed...
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'.$credentials['password'],
        ])->withInput();
        */
    }
    // Authentication failed...
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'.$credentials['password'],
        ])->withInput();
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return  redirect()->route('student.showLogin')->with('success', 'Logged out successfully.');
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
    $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Hash the password before saving
    $validatedData['password'] = bcrypt($validatedData['password']);
 //dd($validatedData);
    // Create the student record
    Student::create($validatedData);
    $credentials = $request->only('email', 'password');

     if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
        return redirect()->route('student.index')->with('success', 'Student created successfully and Login.');

    }
    else{
        // Authentication failed...
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'.$credentials['password'],
        ])->withInput();
        }

    return redirect()->route('student.showLogin')->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $student = Student::findOrFail($id);
        return view('student.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $student = Student::findOrFail($id);
        return view('student.edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,'.$id,
            'dob' => 'required|date',
            'phone' => 'nullable|string|max:15',
            'gender' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:255',
            'course' => 'nullable|string|max:100',
        ]);

        // Update the student record
        $student = Student::findOrFail($id);
        $student->update($validatedData);

        return redirect()->route('student.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
