<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_user = new User;
        $new_user->name = 'Carlo';
        $new_user->email = 'callo12@mail.com';
        $new_user->password = 'Gallo12';

        $new_user->lastname = 'Colletti';
        $new_user->fiscal_code = 'CLCLCLCLCLCLCLCL';
        $new_user->address = 'Via dei geranei';
        $new_user->province = 'roma';
        $new_user->city = 'anzio';
        $new_user->country = 'italia';
        $new_user->zip_code = '00042';
        $new_user->phone = '3888888888';

        $new_user->save();


        $new_user = new User;
        $new_user->name = 'Maroc';
        $new_user->email = 'callo@mail.com';
        $new_user->password = 'Gallo12';

        $new_user->lastname = 'Colletti';
        $new_user->fiscal_code = 'CLCLCLCLCLCLCLfr';
        $new_user->address = 'Via dei geranei';
        $new_user->province = 'roma';
        $new_user->city = 'anzio';
        $new_user->country = 'italia';
        $new_user->zip_code = '00042';
        $new_user->phone = '3888888888';

        $new_user->save();

        $new_user = new User;
        $new_user->name = 'tizio';
        $new_user->email = 'tiozio@mail.com';
        $new_user->password = 'Gallo12';

        $new_user->lastname = 'Colletti';
        $new_user->fiscal_code = 'CLCLCLCLCLCLCLuu';
        $new_user->address = 'Via dei geranei';
        $new_user->province = 'roma';
        $new_user->city = 'anzio';
        $new_user->country = 'italia';
        $new_user->zip_code = '00042';
        $new_user->phone = '3888888888';

        $new_user->save();
    }
}
