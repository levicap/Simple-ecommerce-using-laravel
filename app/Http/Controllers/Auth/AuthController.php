<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\Product; // Import Product model
use Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
  
class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function index(): View
    {
        return view('auth.login');
    }  
    
    /**
     * Show registration form
     */
    public function registration(): View
    {
        return view('auth.registration');
    }
    
    /**
     * Handle login request
     */
    public function postLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully logged in');
        }
        
        return redirect("login")->withError('Oops! You have entered invalid credentials');
    }
    
    /**
     * Handle registration request
     */
    public function postRegistration(Request $request): RedirectResponse
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $user = $this->create($data);
            
        Auth::login($user); 

        return redirect("dashboard")->withSuccess('Great! You have Successfully logged in');
    }
    
    /**
     * Dashboard view with products
     */
    public function dashboard()
    {
        if (Auth::check()) {
            // Fetch all products (you can paginate or filter as needed)
            $products = Product::all(); 
            return view('dashboard', compact('products'));
        }
  
        return redirect("login")->withSuccess('Oops! You do not have access');
    }
    
    /**
     * Create a new user
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    
    /**
     * Logout user
     */
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
