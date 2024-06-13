<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccommodationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $governorates = [
            'Alexandria' => ['Seyouf', 'San Stefano', 'Louran', 'Sidi Bishr'],
            'Cairo' => ['Maadi', 'Heliopolis', 'Nasr City', '6th of October'],
            'Aswan' => ['Daraw', 'Edfu', 'Abu Simbel'],
        ];

        $numAccommodations = 0;
        // $ownerIds = DB::table('owners')->pluck('id')->toArray();
        while ($numAccommodations < 40) {
            $governorate = array_rand($governorates, 1);
            $region = $governorates[$governorate][array_rand($governorates[$governorate], 1)];

            $sharedOrIndividual = ['shared', 'individual'][random_int(0, 1)];
            $numTenants = ($sharedOrIndividual === 'individual') ? 1 : random_int(1, 4);

            // $ownerId = $ownerIds[array_rand($ownerIds)];
            DB::table('accommodations')->insert([
                'description' => 'Accommodation in ' . $region,
                'address' => 'Example address in ' . $region,
                'location_link' => 'https://example.com/location/' . str_replace(' ', '-', $region),
                'governorate' => $governorate,
                'region' => $region,
                'price' => random_int(50, 200),
                'facilities' => 'Facilities: WiFi, Kitchenette, Bathroom',
                'shared_or_individual' => $sharedOrIndividual,
                'owner_id' => random_int(1, 20), // Assuming you have owners with IDs 1 to 10
                // 'owner_id' => $ownerId,
                'no_of_tenants' => $numTenants,
                'no_of_tenants_available' => $numTenants,
                'images' => 'image1.jpg,image2.jpg,image3.jpg',
                'main_image' => 'main_image.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $numAccommodations++;
        }
    }
}
