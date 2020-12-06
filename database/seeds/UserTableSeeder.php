<?php
use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();
    User::create(array(
        'id' => '1',
        'username' => 'rosli',
        //'password' => Hash::make('rosli123'),
        'password' => 'rosli123',
    ));

    // DB::table('users')->delete();
    // User::create(array(
    //     'id'     => '11',
    //     'name'  => 'roslitest',
    //     'username' => 'usertest',
    //     'password' => Hash::make('123456'),
    // ));
}

}