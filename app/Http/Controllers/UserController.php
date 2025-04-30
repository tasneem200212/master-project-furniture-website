<?php

// namespace App\Http\Controllers;

// use App\Models\User;
// use Illuminate\Http\Request;

// class UserController extends Controller
// {
//     // جلب جميع المستخدمين
//     public function index()
//     {
//         $users = User::all();
//         return view('users.index', compact('users'));
//     }

//     // عرض مستخدم معين
//     public function show($id)
//     {
//         $user = User::findOrFail($id);
//         return view('users.show', compact('user'));
//     }

//     // إنشاء مستخدم جديد (عرض النموذج)
//     public function create()
//     {
//         return view('users.create');
//     }

//     // حفظ مستخدم جديد
//     public function store(Request $request)
//     {
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|email|unique:users',
//             'password' => 'required|min:6'
//         ]);

//         User::create([
//             'name' => $request->name,
//             'email' => $request->email,
//             'password' => bcrypt($request->password)
//         ]);

//         return redirect()->route('users.index')->with('success', 'تم إنشاء المستخدم بنجاح');
//     }

//     // تعديل بيانات المستخدم (عرض النموذج)
//     public function edit($id)
//     {
//         $user = User::findOrFail($id);
//         return view('users.edit', compact('user'));
//     }

//     // تحديث بيانات المستخدم
//     public function update(Request $request, $id)
//     {
//         $user = User::findOrFail($id);

//         $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|email|unique:users,email,' . $id,
//         ]);

//         $user->update([
//             'name' => $request->name,
//             'email' => $request->email,
//         ]);

//         return redirect()->route('users.index')->with('success', 'تم تحديث بيانات المستخدم');
//     }

//     // حذف المستخدم
//     public function destroy($id)
//     {
//         User::findOrFail($id)->delete();
//         return redirect()->route('users.index')->with('success', 'تم حذف المستخدم بنجاح');
//     }
// }
