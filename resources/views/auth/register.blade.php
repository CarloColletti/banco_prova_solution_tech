<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input name="name" id="name" class="block mt-1 w-full" type="text" name="name"
                :value="old('name')" autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- last name -->
        <div class="mt-4">
            <x-input-label for="lastname" :value="__('Lastname')" />
            <x-text-input name="lastname" id="lastname" class="block mt-1 w-full" type="text" lastname="lastname"
                :value="old('lastname')" autofocus autocomplete="lastname" />
            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
        </div>

        <!-- Fiscal Code -->
        <div class="mt-4">
            <x-input-label for="fiscal_code" :value="__('Fiscal Code')" />
            <x-text-input name="fiscal_code" id="fiscal_code" class="block mt-1 w-full" type="text"
                fiscal_code="fiscal_code" :value="old('fiscal_code')" autofocus autocomplete="fiscal_code" />
            <x-input-error :messages="$errors->get('fiscal_code')" class="mt-2" />
        </div>

        <!-- address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input name="address" id="address" class="block mt-1 w-full" type="text" address="address"
                :value="old('address')" autofocus autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        {{-- province --}}
        {{-- <div class="mt-4">
            <select name="address" id="address" class="block mt-1 w-full" address="address">
                <option value="agrigento">agrigento</option>
                <option value="alessandria">alessandria</option>
                <option value="ancona">ancona</option>
                <option value="aosta">aosta</option>
                <option value="arezzo">arezzo</option>
                <option value="ascoli">ascoli piceno</option>
                <option value="asti">asti</option>
                <option value="avellino">avellino</option>
                <option value="bari">bari</option>
                <option value="barletta-andria-trani">barletta-andria-trani</option>
                <option value="belluno">belluno</option>
                <option value="benevento">benevento</option>
                <option value="bergamo">bergamo</option>
                <option value="biella">biella</option>
                <option value="bologna">bologna</option>
                <option value="bolzano">bolzano</option>
                <option value="brescia">brescia</option>
                <option value="brindisi">brindisi</option>
                <option value="cagliari">cagliari</option>
                <option value="caltanissetta">caltanissetta</option>
                <option value="campobasso">campobasso</option>
                <option value="carbonia-iglesias">carbonia-iglesias</option>
                <option value="caserta">caserta</option>
                <option value="catania">catania</option>
                <option value="catanzaro">catanzaro</option>
                <option value="chieti">chieti</option>
                <option value="como">como</option>
                <option value="cosenza">cosenza</option>
                <option value="cremona">cremona</option>
                <option value="crotone">crotone</option>
                <option value="cuneo">cuneo</option>
                <option value="enna">enna</option>
                <option value="fermo">fermo</option>
                <option value="ferrara">ferrara</option>
                <option value="firenze">firenze</option>
                <option value="foggia">foggia</option>
                <option value="forli’-cesena">forli’-cesena</option>
                <option value="frosinone">frosinone</option>
                <option value="genova">genova</option>
                <option value="gorizia">gorizia</option>
                <option value="grosseto">grosseto</option>
                <option value="imperia">imperia</option>
                <option value="isernia">isernia</option>
                <option value="la spezia">la spezia</option>
                <option value="l’aquila">l’aquila</option>
                <option value="latina">latina</option>
                <option value="lecce">lecce</option>
                <option value="lecco">lecco</option>
                <option value="livorno">livorno</option>
                <option value="lodi">lodi</option>
                <option value="lucca">lucca</option>
                <option value="macerata">macerata</option>
                <option value="mantova">mantova</option>
                <option value="massa">massa-carrara</option>
                <option value="matera">matera</option>
                <option value="medio campidano">medio campidano</option>
                <option value="messina">messina</option>
                <option value="milano">milano</option>
                <option value="modena">modena</option>
                <option value="monza e della brianza">monza e della brianza</option>
                <option value="napoli">napoli</option>
                <option value="novara">novara</option>
                <option value="nuoro">nuoro</option>
                <option value="ogliastra">ogliastra</option>
                <option value="olbia">olbia-tempio</option>
                <option value="oristano">oristano</option>
                <option value="padova">padova</option>
                <option value="palermo">palermo</option>
                <option value="parma">parma</option>
                <option value="pavia">pavia</option>
                <option value="perugia">perugia</option>
                <option value="pesaro e urbino">pesaro e urbino</option>
                <option value="pescara">pescara</option>
                <option value="piacenza">piacenza</option>
                <option value="pisa">pisa</option>
                <option value="pistoia">pistoia</option>
                <option value="pordenone">pordenone</option>
                <option value="potenza">potenza</option>
                <option value="prato">prato</option>
                <option value="ragusa">ragusa</option>
                <option value="ravenna">ravenna</option>
                <option value="reggio di calabria">reggio di calabria</option>
                <option value="reggio nell’emilia">reggio nell’emilia</option>
                <option value="rieti">rieti</option>
                <option value="rimini">rimini</option>
                <option value="roma">roma</option>
                <option value="rovigo">rovigo</option>
                <option value="salerno">salerno</option>
                <option value="sassari">sassari</option>
                <option value="savona">savona</option>
                <option value="siena">siena</option>
                <option value="siracusa">siracusa</option>
                <option value="sondrio">sondrio</option>
                <option value="taranto">taranto</option>
                <option value="teramo">teramo</option>
                <option value="terni">terni</option>
                <option value="torino">torino</option>
                <option value="trapani">trapani</option>
                <option value="trento">trento</option>
                <option value="treviso">treviso</option>
                <option value="trieste">trieste</option>
                <option value="udine">udine</option>
                <option value="varese">varese</option>
                <option value="venezia">venezia</option>
                <option value="verbano-cusio-ossola">verbano-cusio-ossola</option>
                <option value="vercelli">vercelli</option>
                <option value="verona">verona</option>
                <option value="vibo valentia">vibo valentia</option>
                <option value="vicenza">vicenza</option>
                <option value="viterbo">viterbo</option>

            </select>
        </div> --}}
        <div class="mt-4">
            <x-input-label for="province" :value="__('Province')" />
            <x-text-input name="province" id="province" class="block mt-1 w-full" type="text" province="province"
                :value="old('province')" autofocus autocomplete="province" />
            <x-input-error :messages="$errors->get('province')" class="mt-2" />
        </div>

        <!-- city -->
        <div class="mt-4">
            <x-input-label for="city" :value="__('City')" />
            <x-text-input name="city" id="city" class="block mt-1 w-full" type="text" city="city"
                :value="old('city')" autofocus autocomplete="city" />
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>



        <!-- country -->
        <div class="mt-4">
            <x-input-label for="country" :value="__('Country')" />
            <x-text-input name="country" id="country" class="block mt-1 w-full" type="text" country="country"
                :value="old('country')" autofocus autocomplete="country" />
            <x-input-error :messages="$errors->get('country')" class="mt-2" />
        </div>

        <!-- zip_code -->
        <div class="mt-4">
            <x-input-label for="zip_code" :value="__('Zip Code')" />
            <x-text-input name="zip_code" id="zip_code" class="block mt-1 w-full" type="text" zip_code="zip_code"
                :value="old('zip_code')" autofocus autocomplete="zip_code" />
            <x-input-error :messages="$errors->get('zip_code')" class="mt-2" />
        </div>

        <!-- phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input name="phone" id="phone" class="block mt-1 w-full" type="text" phone="phone"
                :value="old('phone')" autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
