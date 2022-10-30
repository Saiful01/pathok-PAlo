<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Event;
use App\Models\EventGuestCategory;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            "name" => "Prothom Alo",
            "address" => "Dhaka",
        ]);

        Event::create([
            'company_id' => 1,
            'title' => "Pathok Somabesh",
            'details' => "Pathok Somabesh",
            'date' => "01/09/2022",
            'location' => "Dhaka",
        ]);

        EventGuestCategory::create([
            "title" => "অনসাইট নিবন্ধন"
        ]);
        EventGuestCategory::create([
            "title" => "প্রি-ডিফাইন"
        ]);

        EventGuestCategory::create([
            "title" => "পাঠক"
        ]);


        EventGuestCategory::create([
            "title" => "Director"
        ]);

        EventGuestCategory::create([
            "title" => "Actor"
        ]);
        EventGuestCategory::create([
            "title" => "Producer"
        ]);
        EventGuestCategory::create([
            "title" => "Singer"
        ]);
        EventGuestCategory::create([
            "title" => "Music Director"
        ]);
        EventGuestCategory::create([
            "title" => "Cinematographer"
        ]);
        EventGuestCategory::create([
            "title" => "Editor"
        ]);
        EventGuestCategory::create([
            "title" => "Crew"
        ]);
        EventGuestCategory::create([
            "title" => "Partner"
        ]);
        EventGuestCategory::create([
            "title" => "Prothom Alo"
        ]);
        EventGuestCategory::create([
            "title" => "Regular"
        ]);
        EventGuestCategory::create([
            "title" => "CXO"
        ]);
        EventGuestCategory::create([
            "title" => "VIP"
        ]);

        /* Guest::create([
            'category_id'=>1,
            'name'=>"Motiur Rahaman",
            'email'=>"memotiur@gmail.com",
            'phone_number'=>"01717849968",
            'address'=>"Dhaka",
            'picture'=>"",
         ]);

         EventGuest::create([
            'event_id'=>1,
            'guest_id'=>1,
            'qr_code'=>uniqid(),
         ]);*/
    }
}
