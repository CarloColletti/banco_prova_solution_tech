<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input name="name" id="name" class="block mt-1 w-full" type="text" name="name"
                :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- last name -->
        <div class="mt-4">
            <x-input-label for="lastname" :value="__('Lastname')" />
            <x-text-input name="lastname" id="lastname" class="block mt-1 w-full" type="text" lastname="lastname"
                :value="old('lastname')" required autofocus autocomplete="lastname" />
            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
        </div>

        <!-- Fiscal Code -->
        <div class="mt-4">
            <x-input-label for="fiscal_code" :value="__('Fiscal Code')" />
            <x-text-input name="fiscal_code" id="fiscal_code" class="block mt-1 w-full" type="text"
                fiscal_code="fiscal_code" :value="old('fiscal_code')" required autofocus autocomplete="fiscal_code" />
            <x-input-error :messages="$errors->get('fiscal_code')" class="mt-2" />
        </div>

        <!-- address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input name="address" id="address" class="block mt-1 w-full" type="text" address="address"
                :value="old('address')" required autofocus autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- province -->
        <div class="mt-4">
            <x-input-label for="province" :value="__('Province')" />
            <x-text-input name="province" id="province" class="block mt-1 w-full" type="text" province="province"
                :value="old('province')" required autofocus autocomplete="province" />
            <x-input-error :messages="$errors->get('province')" class="mt-2" />
        </div>

        <!-- city -->
        <div class="mt-4">
            <x-input-label for="city" :value="__('City')" />
            <x-text-input name="city" id="city" class="block mt-1 w-full" type="text" city="city"
                :value="old('city')" required autofocus autocomplete="city" />
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>

        <!-- country -->
        <div class="mt-4">
            <x-input-label for="country" :value="__('Country')" />
            <x-text-input name="country" id="country" class="block mt-1 w-full" type="text" country="country"
                :value="old('country')" required autofocus autocomplete="country" />
            <x-input-error :messages="$errors->get('country')" class="mt-2" />
        </div>

        <!-- zip_code -->
        <div class="mt-4">
            <x-input-label for="zip_code" :value="__('Zip Code')" />
            <x-text-input name="zip_code" id="zip_code" class="block mt-1 w-full" type="text" zip_code="zip_code"
                :value="old('zip_code')" required autofocus autocomplete="zip_code" />
            <x-input-error :messages="$errors->get('zip_code')" class="mt-2" />
        </div>

        <!-- phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input name="phone" id="phone" class="block mt-1 w-full" type="text" phone="phone"
                :value="old('phone')" required autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

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
