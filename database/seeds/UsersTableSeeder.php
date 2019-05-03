<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $users = factory(\App\Models\User::class)->times(50)->make();
        \App\Models\User::insert($users->makeVisible(['password', 'remember_token'])->toArray());

        $user = \App\Models\User::find(1);
        $user->name = 'tao';
        $user->email = '605682551@qq.com';
        $user->password = bcrypt('123123');
        $user->save();
    }
}
