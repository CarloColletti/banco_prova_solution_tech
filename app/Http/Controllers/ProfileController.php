<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        $form_data = $request->all();

        $this->validation($form_data);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
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
