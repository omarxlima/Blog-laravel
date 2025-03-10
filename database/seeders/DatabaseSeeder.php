<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User
       $user = User::firstOrCreate([
            'email' => "admin@email.com"
        ],
                [
                    'name' => 'skywalker',
                    'password' => Hash::make('blogpassword'),
                    'email_verified_at' => now(),
                    'role_as' => 1
                ]
       );

       //Category
       $categoria = Category::firstOrCreate([
           'slug' => 'php',
    ],
    [
            'name' => 'php',
            'created_by' => $user->id,
            'description' => "
               php 8.3
            ",
            'image' => 'uploads/categoria/1737634720.png',
            'meta_title' => 'est aperiam assumenda.',
            'meta_description' => 'Repudiandae rerum quasi amet deserunt dolores vel iusto. Qui est expedita quia impedit. Voluptatem amet in ut possimus sequi. Molestias iusto ex aspernatur repellat.',
            'meta_keyword' => 'ut',
            'navbar_status' => 0,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
       ]);

       $post = Post::firstOrCreate([
           'name' => 'Hello World',
        ],
        [
            'category_id' => $categoria->id,
            'created_by' => $user->id,
            'slug' => 'hellow-world',
            'description' => "
                 Welcome to Laravel-blog !<br><br>   
                 PHP is a server-side scripting language used to create <br><br>
                 dynamic content on websites.. It is an open source, popular and versatile language. <br><br>
Features It is an interpreted language, It is aimed at developing web applications, It is object-oriented,!<br><br>
 It is high-performance, It is capable of supporting large amounts of data.
            ",
            'meta_title' => 'Aut architecto porro dignissimos.',
            'meta_keyword' => 'veniam',
            'meta_description' => 'Necessitatibus sequi qui sed quia sed. Et ab sunt ab libero in nulla voluptas.',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()

       ]);
    }
}
