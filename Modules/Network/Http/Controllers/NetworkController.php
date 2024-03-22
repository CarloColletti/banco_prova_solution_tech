<?php

namespace Modules\Network\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;

class NetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(User $users)
    {
        $users = User::all();
        return view('network::index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('network::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('network::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(User $user)
    {

        // dd($user);
        return view('network::edit',  compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, User $user)
    {
        $form_data = $request->all();

        $this->validation($form_data);

        $user->update($form_data);

        // dd($user);
        $user->save();

        return redirect()->route('network.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(User $user)
    {
        if ($user->id === auth()->user()->id) {
            return abort(403);
        }

        $user->delete();

        return redirect()->route('network.index');
    }


    private function validation($form_data)
    {
        $validator = Validator::make($form_data, [
            'name' => 'required|min:2|max:30',
            'lastname' => 'required|min:2|max:20',
            'fiscal_code' => 'required|min:16|max:16', //unique:users,fiscal_code'
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
            // 'fiscal_code.unique' => 'Il Codice Fiscale è già presente',

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
