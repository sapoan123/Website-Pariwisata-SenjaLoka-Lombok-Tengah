<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Gallery;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            Auth::user()->update(['last_login_at' => now()]);

            if ($request->wantsJson()) {
                return response()->json(['success' => true, 'redirect' => '/']);
            }

            if (Auth::user()->isAdmin()) {
                return redirect()->intended('/admin/dashboard');
            }

            $request->session()->forget('url.intended');

            return redirect('/');
        }

        if ($request->wantsJson()) {
            return response()->json(['success' => false, 'message' => 'Email atau password salah.'], 422);
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function showAdminLogin()
    {
        return view('auth.admin-login');
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $user = Auth::user();
            if ($user->isAdmin()) {
                $request->session()->regenerate();

                $user->update(['last_login_at' => now()]);

                return redirect()->intended('/admin/dashboard')->with('success', 'Selamat datang kembali, '.$user->name.'!');
            }
            Auth::logout();
            $request->session()->invalidate();

            return back()->withErrors([
                'email' => 'Akses ditolak. Hanya admin yang bisa login di sini.',
            ])->onlyInput('email');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'user',
        ]);

        return redirect('/login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }

    public function showAdminRegister()
    {
        return view('auth.admin-register');
    }

    public function adminRegister(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'admin',
        ]);

        return redirect('/admin/login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }

    public function adminDashboard()
    {
        $destinations = Destination::whereIn('category', ['pantai', 'bukit', 'air terjun'])->latest()->get();
        $stats = [
            'destinations_approved' => Destination::where('status', 'approved')->whereIn('category', ['pantai', 'bukit', 'air terjun'])->count(),
            'galleries' => Gallery::where('status', 'approved')->count(),
            'testimonials_approved' => Testimonial::where('status', 'approved')->count(),
            'total_users' => User::count(),
        ];

        return view('admin.dashboard', compact('destinations', 'stats'));
    }

    public function users()
    {
        $users = User::latest()->paginate(15);

        return view('admin.users', compact('users'));
    }

    public function editUser(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'role' => 'required|in:user,admin',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroyUser(User $user)
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Tidak dapat menghapus akun sendiri.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil dihapus.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
