<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            // 'name' => ['required', 'string', 'max:255'],
            // 'lastname' => ['required', 'string', 'max:255'],
            // 'fiscal_code' => ['unique', 'string', 'max:16'],
            // 'address' => ['nullable', 'string'],
            // 'province' => ['nullable', 'string'],
            // 'city' => ['nullable', 'string'],
            // 'country' => ['nullable', 'string'],
            // 'zip_code' => ['nullable', 'string'],
            // 'phone' => ['nullable', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $form_data = $request->all();

        $this->validation($form_data);




        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'fiscal_code' => $request->fiscal_code,
            'address' => $request->address,
            'province' => $request->province,
            'city' => $request->city,
            'country' => $request->country,
            'zip_code' => $request->zip_code,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    private function validation($form_data)
    {
        $validator = Validator::make($form_data, [
            'name' => 'required|min:2|max:30',
            'lastname' => 'required|min:2|max:20',
            'fiscal_code' => 'required|min:16|max:16|unique:users,fiscal_code',
            'address' => 'required|max:70',
            'province' => 'required', //usare dopo in:nome1,mome2 ecc per tutte le provincie
            'city' => 'required', //stassa cosa per city
            'country' => 'required', //
            'zip_code' => 'required',
            'phone' => 'required|max:30',
        ], [
            //name
            'name.required' => 'Inserire il nome',
            'name.max' => 'Il nome è troppo lungo',
            'name.min' => 'Il nome è troppo corto',

            //lastname
            'lastname.required' => 'Inserire il cognome',
            'lastname.min' => 'Il cognome è troppo piccolo',
            'lastname.max' => 'Il cognome è troppo grande',

            //fiscal code
            'fiscal_code.required' => 'Iserire un Codice Fiscale',
            'fiscal_code.min' => 'Inserire un Codice Fiscale valido (minimo 16 caratteri)',
            'fiscal_code.max' => 'Inserire un Codice Fiscale valido (massimo 16 caratteri)',
            'fiscal_code.unique' => 'Il Codice Fiscale è già presente',

            //address
            'address.required' => 'Inserire il proprio indirizzo',
            'address.max' => "Inserire un'indirizzo valido",

            //province
            'province.required' => 'Inserisci la provincia',
            // 'province' => '',

            //city
            'city.required' => 'Inserisci la città',
            // 'city' => '',

            //country
            'country.required' => 'Insersci il paese',
            // 'country' => '',

            //zip_code
            'zip_code.required' => 'Inserisci il codice postale',

            //phone
            'phone.required' => 'Inserisci il numero di telefono',
            'phone.max' => 'Il numeor è troppo lungo',
            // '' => '',

        ])->validate();
    }
}
