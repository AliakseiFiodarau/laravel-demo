<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\User;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        DB::table('posts')->insert([
            'user_id' => random_int(1, User::all()->count()),
            'name' => Str::random('10'),
            'email' => Str::random('10') . '@mail.com',
            'phone_number' => random_int(100000000, 999999999),
            'text' => Str::random(256),
        ]);
    }
}
