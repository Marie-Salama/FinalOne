<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RentalsTableSeeder extends Seeder
{

    // public function run(): void
    // public function run()
    // {
    //     $userIds = DB::table('users')->pluck('id')->toArray();
    //     $accommodationIds = DB::table('accommodations')->pluck('id')->toArray();
    //     $reci = 'https://templates.invoicehome.com/receipt-template-en-classic-white-750px.png';
    //     $ref = 1234563212345;

    //     for ($i = 0; $i < 40; $i++) {
    //         $startDate = Carbon::now()->addDays(random_int(1, 30))->format('Y-m-d');
    //         $endDate = Carbon::parse($startDate)->addMonths(random_int(1, 6))->format('Y-m-d');
    //         // $endDate = Carbon::parse($startDate)->addDays(random_int(1, 14))->format('Y-m-d');

    //         $userId = $userIds[array_rand($userIds)];
    //         $accommodationId = $accommodationIds[array_rand($accommodationIds)];

    //         DB::table('rentals')->insert([
    //             'start_date' => $startDate,
    //             'end_date' => $endDate,
    //             'user_id' => $userId,
    //             'accommodations_id' => $accommodationId,
    //             // 'receipt' => 'receipt_' . $i . '.pdf',
    //             'receipt' => $reci,
    //             'confirmed' => (bool) random_int(0, 1),
    //             'reference_number' => $ref,
    //             // 'reference_number' => 'REF-' . str_pad($i + 1, 4, '0', STR_PAD_LEFT),
    //             // 'created_at' => now(),
    //             // 'updated_at' => now(),
    //         ]);
    //     }
    // }
    /*public function run()
    {
        $users = DB::table('users')->get();
        $accommodations = DB::table('accommodations')->get();

        for ($i = 0; $i < 40; $i++) {
            $startDate = Carbon::now()->addDays(random_int(1, 30))->format('Y-m-d');
            $endDate = Carbon::parse($startDate)->addMonths(random_int(1, 6))->format('Y-m-d');

            $reci = 'https://templates.invoicehome.com/receipt-template-en-classic-white-750px.png';
            $ref = 1234563212345;

            foreach ($users as $user) {
                $matchingAccommodations = $accommodations->where('governorate', $user->where_to_go);

                if ($matchingAccommodations->isNotEmpty()) {
                    $randomAccommodation = $matchingAccommodations->random();

                    DB::table('rentals')->insert([
                        'start_date' => $startDate,
                        'end_date' => $endDate,
                        // 'start_date' => Carbon::now()->addDays(random_int(1, 30))->format('Y-m-d'),
                        // 'end_date' => Carbon::parse(Carbon::now()->addDays(random_int(1, 30))->format('Y-m-d'))->addMonths(random_int(1, 6))->format('Y-m-d'),
                        'user_id' => $user->id,
                        'accommodations_id' => $randomAccommodation->id,
                        'receipt' => $reci,
                        // 'receipt' => 'https://templates.invoicehome.com/receipt-template-en-classic-white-750px.png',
                        'confirmed' => (bool) random_int(0, 1),
                        'reference_number' => $ref,
                        // 'reference_number' => 'REF-' . str_pad(DB::table('rentals')->count() + 1, 6, '0', STR_PAD_LEFT),
                        // 'created_at' => Carbon::now(),
                        // 'updated_at' => Carbon::now(),
                    ]);
                }
            }
        }
    }*/
    public function run()
    {
        $users = DB::table('users')->get();
        $accommodations = DB::table('accommodations')->get();

        for ($i = 0; $i < 40; $i++) {
            $startDate = Carbon::now()->addDays(random_int(1, 30))->format('Y-m-d');
            $endDate = Carbon::parse($startDate)->addMonths(random_int(1, 6))->format('Y-m-d');

            $reci = 'https://templates.invoicehome.com/receipt-template-en-classic-white-750px.png';
            $ref = 1234563212345;

            $user = $users->random();
            $matchingAccommodations = $accommodations->where('governorate', $user->where_to_go);

            if ($matchingAccommodations->isNotEmpty()) {
                $randomAccommodation = $matchingAccommodations->random();

                DB::table('rentals')->insert([
                    'start_date' => $startDate,
                    'end_date' => $endDate,
                    'user_id' => $user->id,
                    'accommodations_id' => $randomAccommodation->id,
                    'receipt' => $reci,
                    'confirmed' => (bool) random_int(0, 1),
                    'reference_number' => $ref,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
