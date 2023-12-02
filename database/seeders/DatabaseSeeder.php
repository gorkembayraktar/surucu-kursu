<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::insert([
            'name' => 'Smurf Theme',
            'email' => 'dev@smurftheme.com',
            'verified' => true,
            'email_verified_at' => now(),
            'password' => Hash::make('dev'), 
            'type' => 'admin',
            'remember_token' => Str::random(10),
            'profile_photo_path' => null
        ]);


        $settings = [
            "title" => [config('app.name') , 1],
            "logo" => ["", 1],
            "logo_dark" => ["", 1],
            "favicon" => ["", 1],
            "active" => ["", 1],
            "preloader" => ["", 1],
            "facebook" => ["", 1],
            "instagram" => ["", 1],
            "youtube" => ["", 1],
            "twitter" => ["", 1],
            "seo_author" => ["", 1],
            "seo_description" => ["", 1],
            "seo_keywords" => ["", 1],
            "tell" => ["", 1],
            "email" => ["", 1],
            "adress" => ["", 1],
            "html_head" => ["", 1],
            "html_css" => ["", 1],
            "html_js" => ["", 1],
            "html_body" => ["", 1],
            "altfooter" => ["", 1],
            "footer" => ["", 1],
            "mapiframe" => ["", 1],
            "maintenance_html" => ["", 1]
        ];

        foreach($settings as $key => $values):
            \App\Models\Settings::insert([
                'key' => $key,
                'value' => $values[0],
                'autoload' => (boolean)$values[1]
            ]);
        endforeach;

        \App\Models\BlogCategory::insert([
            "title" => "Genel",
            "slug" => "genel",
            "id" => 1
        ]);

        
    }
}
