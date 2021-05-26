 <?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([

            'name' => 'Michael Deme',
            'email' => 'micdem96@gmail.com',
            'password' => bcrypt('password'),
            'admin' => 1
        ]);

        App\Profile::create([

            'user_id' => 1,
            'avatar' => 'uploads/avatars/1.jpg ',
            'about' => 'micted micted micted micted',
            'facebook' => 'facebook.com',
            'youtube'=> 'youtube.com'
        ]);
    }
}
