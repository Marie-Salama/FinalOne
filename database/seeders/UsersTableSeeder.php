<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    // /**
    //  * Run the database seeds.
    //  */

    //     DB::table('users')->insert([
    //         [
    //             'name' => 'Amr Hassan',
    //             'email' => 'amrhassan@gmail.com',
    //             'status' => 'active',
    //             'gender' => 'male',
    //             'age' => 25,
    //             'city' => 'Cairo',
    //             'where_to_go' => 'Alexandria',
    //             'phone' => '0123456789',
    //             'photo' => 'https://img.freepik.com/free-photo/positive-brunet-man-with-crossed-arms_1187-5797.jpg?size=626&ext=jpg&ga=GA1.1.1128979091.1706343120&semt=sph',
    //             'password' => Hash::make('123456789'),
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'name' => 'Sara Ali',
    //             'email' => 'saraali@gmail.com',
    //             'status' => 'active',
    //             'gender' => 'female',
    //             'age' => 28,
    //             'city' => 'Alexandria',
    //             'where_to_go' => 'Cairo',
    //             'phone' => '0123456790',
    //             'photo' => 'https://img.freepik.com/free-photo/positive-woman-with-crossed-arms_1187-5707.jpg?size=626&ext=jpg',
    //             'password' => Hash::make('123456789'),
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //     ]);

    //     $names = ['Mohamed Saeed', 'Fatima Ahmed', 'Ahmed Khalid', 'Nada Mahmoud', 'Youssef Tarek',
    //               'Marwa Hassan', 'Khaled Mostafa', 'Aya Fawzy', 'Mahmoud Eid', 'Salma Kamal',
    //               'Omar Hesham', 'Dalia Samy', 'Kareem Essam', 'Hana Adel', 'Ayman Fathy',
    //               'Rania Magdy', 'Tarek Gamal', 'Manal Abdel-Aziz', 'Walid Ramadan', 'Reem Sameh'];

    //     foreach ($names as $name) {
    //         DB::table('users')->insert([
    //             'name' => $name,
    //             'email' => strtolower(str_replace(' ', '', $name)) . '@example.com',
    //             'status' => $faker->randomElement(['worker', 'student']),
    //             'gender' => $faker->randomElement(['male', 'female']),
    //             'age' => $faker->numberBetween(18, 45),
    //             'city' => $faker->randomElement(['Cairo', 'Alexandria', 'Giza', 'Shubra El-Kheima', 'Port Said', 'Suez', 'Luxor', 'Aswan', 'Mansoura', 'Tanta']),
    //             'where_to_go' => $faker->randomElement(['Cairo', 'Alexandria', 'Giza', 'Shubra El-Kheima', 'Port Said', 'Suez', 'Luxor', 'Aswan', 'Mansoura', 'Tanta']),
    //             'phone' => $faker->phoneNumber,
    //             'photo' => 'https://picsum.photos/id/' . $faker->numberBetween(1, 1000) . '/200/200',
    //             'password' => Hash::make($faker->password),
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);
    //     }

    // public function run(): void
    // {
    //     DB::table('users')->insert([
    //         ['name' => 'Amr Hassan', 'email' => 'amrhassan@gmail.com', 'status' => 'active', 'gender' => 'male', 'age' => 25, 'city' => 'Cairo', 'where_to_go' => 'Alexandria', 'phone' => '0123456789', 'photo' => 'https://img.freepik.com/free-photo/positive-brunet-man-with-crossed-arms_1187-5797.jpg?size=626&ext=jpg&ga=GA1.1.1128979091.1706343120&semt=sph', 'password' => Hash::make('123456789')],
    //         ['name' => 'Sara Ali', 'email' => 'saraali@gmail.com', 'status' => 'active', 'gender' => 'female', 'age' => 28, 'city' => 'Alexandria', 'where_to_go' => 'Cairo', 'phone' => '0123456790', 'photo' => 'https://img.freepik.com/free-photo/positive-woman-with-crossed-arms_1187-5707.jpg?size=626&ext=jpg', 'password' => Hash::make('123456789')],
    //         ['name' => 'John Doe', 'email' => 'johndoe@gmail.com', 'status' => 'inactive', 'gender' => 'male', 'age' => 30, 'city' => 'Giza', 'where_to_go' => 'Aswan', 'phone' => '0123456791', 'photo' => 'https://img.freepik.com/free-photo/man-with-crossed-arms_1187-5807.jpg?size=626&ext=jpg', 'password' => Hash::make('123456789')],
    //         ['name' => 'Jane Smith', 'email' => 'janesmith@gmail.com', 'status' => 'active', 'gender' => 'female', 'age' => 22, 'city' => 'Aswan', 'where_to_go' => 'Giza', 'phone' => '0123456792', 'photo' => 'https://img.freepik.com/free-photo/woman-smiling_1187-5697.jpg?size=626&ext=jpg', 'password' => Hash::make('123456789')],
    //         ['name' => 'Ahmed Salah', 'email' => 'ahmedsalah@gmail.com', 'status' => 'inactive', 'gender' => 'male', 'age' => 35, 'city' => 'Luxor', 'where_to_go' => 'Cairo', 'phone' => '0123456793', 'photo' => 'https://img.freepik.com/free-photo/smiling-man_1187-5877.jpg?size=626&ext=jpg', 'password' => Hash::make('123456789')],
    //         ['name' => 'Mona Ahmed', 'email' => 'monaahmed@gmail.com', 'status' => 'active', 'gender' => 'female', 'age' => 27, 'city' => 'Alexandria', 'where_to_go' => 'Giza', 'phone' => '0123456794', 'photo' => 'https://img.freepik.com/free-photo/smiling-woman_1187-5687.jpg?size=626&ext=jpg', 'password' => Hash::make('123456789')],
    //         ['name' => 'Omar Mohamed', 'email' => 'omarmohamed@gmail.com', 'status' => 'inactive', 'gender' => 'male', 'age' => 32, 'city' => 'Cairo', 'where_to_go' => 'Luxor', 'phone' => '0123456795', 'photo' => 'https://img.freepik.com/free-photo/portrait-man_1187-5837.jpg?size=626&ext=jpg', 'password' => Hash::make('123456789')],
    //         ['name' => 'Nadia Hassan', 'email' => 'nadiahassan@gmail.com', 'status' => 'active', 'gender' => 'female', 'age' => 26, 'city' => 'Aswan', 'where_to_go' => 'Cairo', 'phone' => '0123456796', 'photo' => 'https://img.freepik.com/free-photo/smiling-woman_1187-5697.jpg?size=626&ext=jpg', 'password' => Hash::make('123456789')],
    //         ['name' => 'Ali Kamal', 'email' => 'alikamal@gmail.com', 'status' => 'inactive', 'gender' => 'male', 'age' => 29, 'city' => 'Giza', 'where_to_go' => 'Alexandria', 'phone' => '0123456797', 'photo' => 'https://img.freepik.com/free-photo/man-with-smile_1187-5857.jpg?size=626&ext=jpg', 'password' => Hash::make('123456789')],
    //         ['name' => 'Laila Mansour', 'email' => 'lailamansour@gmail.com', 'status' => 'active', 'gender' => 'female', 'age' => 31, 'city' => 'Luxor', 'where_to_go' => 'Giza', 'phone' => '0123456798', 'photo' => 'https://img.freepik.com/free-photo/woman-smiling_1187-5707.jpg?size=626&ext=jpg', 'password' => Hash::make('123456789')],
    //         ['name' => 'Youssef Saeed', 'email' => 'youssefsaeed@gmail.com', 'status' => 'inactive', 'gender' => 'male', 'age' => 24, 'city' => 'Cairo', 'where_to_go' => 'Aswan', 'phone' => '0123456799', 'photo' => 'https://img.freepik.com/free-photo/portrait-man_1187-5807.jpg?size=626&ext=jpg', 'password' => Hash::make('123456789')],
    //         ['name' => 'Fatima Ahmed', 'email' => 'fatimaahmed@gmail.com', 'status' => 'active', 'gender' => 'female', 'age' => 27, 'city' => 'Alexandria', 'where_to_go' => 'Cairo', 'phone' => '0123456700', 'photo' => 'https://img.freepik.com/free-photo/smiling-woman_1187-5687.jpg?size=626&ext=jpg', 'password' => Hash::make('123456789')],
    //         ['name' => 'Hassan Mahmoud', 'email' => 'hassanmahmoud@gmail.com', 'status' => 'inactive', 'gender' => 'male', 'age' => 33, 'city' => 'Giza', 'where_to_go' => 'Luxor', 'phone' => '0123456701', 'photo' => 'https://img.freepik.com/free-photo/man-with-smile_1187-5857.jpg?size=626&ext=jpg', 'password' => Hash::make('123456789')],
    //         ['name' => 'Noor Khaled', 'email' => 'noorkhaled@gmail.com', 'status' => 'active', 'gender' => 'female', 'age' => 28, 'city' => 'Aswan', 'where_to_go' => 'Giza', 'phone' => '0123456702', 'photo' => 'https://img.freepik.com/free-photo/smiling-woman_1187-5707.jpg?size=626&ext=jpg', 'password' => Hash::make('123456789')],
    //         ['name' => 'Salma Hassan', 'email' => 'salmahassan@gmail.com', 'status' => 'inactive', 'gender' => 'female', 'age' => 25, 'city' => 'Cairo', 'where_to_go' => 'Alexandria', 'phone' => '0123456703', 'photo' => 'https://img.freepik.com/free-photo/woman-smiling_1187-5697.jpg?size=626&ext=jpg', 'password' => Hash::make('123456789')],
    //         ['name' => 'Karim Ali', 'email' => 'karimali@gmail.com', 'status' => 'active', 'gender' => 'male', 'age' => 30, 'city' => 'Giza', 'where_to_go' => 'Cairo', 'phone' => '0123456704', 'photo' => 'https://img.freepik.com/free-photo/man-with-crossed-arms_1187-5807.jpg?size=626&ext=jpg', 'password' => Hash::make('123456789')],
    //         ['name' => 'Hoda Emad', 'email' => 'hodaemad@gmail.com', 'status' => 'inactive', 'gender' => 'female', 'age' => 22, 'city' => 'Alexandria', 'where_to_go' => 'Luxor', 'phone' => '0123456705', 'photo' => 'https://img.freepik.com/free-photo/smiling-woman_1187-5687.jpg?size=626&ext=jpg', 'password' => Hash::make('123456789')],
    //         ['name' => 'Mustafa Ibrahim', 'email' => 'mustafaibrahim@gmail.com', 'status' => 'active', 'gender' => 'male', 'age' => 35, 'city' => 'Cairo', 'where_to_go' => 'Aswan', 'phone' => '0123456706', 'photo' => 'https://img.freepik.com/free-photo/portrait-man_1187-5817.jpg?size=626&ext=jpg', 'password' => Hash::make('123456789')],
    //         ['name' => 'Nourhan Omar', 'email' => 'nourhanomar@gmail.com', 'status' => 'inactive', 'gender' => 'female', 'age' => 26, 'city' => 'Giza', 'where_to_go' => 'Alexandria', 'phone' => '0123456707', 'photo' => 'https://img.freepik.com/free-photo/smiling-woman_1187-5707.jpg?size=626&ext=jpg', 'password' => Hash::make('123456789')],
    //         ['name' => 'Ramy Khaled', 'email' => 'ramykhaled@gmail.com', 'status' => 'active', 'gender' => 'male', 'age' => 29, 'city' => 'Aswan', 'where_to_go' => 'Giza', 'phone' => '0123456708', 'photo' => 'https://img.freepik.com/free-photo/man-with-crossed-arms_1187-5797.jpg?size=626&ext=jpg', 'password' => Hash::make('123456789')],
    //    ]);
    //}

    public function run(Faker $faker)
    {
        $names = ['Amr Khalid', 'Mona Essam', 'Ahmed Saleh', 'Fatima Hamed', 'Karim Adel',
                  'Dalia Fouad', 'Mostafa Nabil', 'Aya Tarek', 'Mohamed Samir', 'Heba Zaher',
                  'Omar Wael', 'Marwa Khaled', 'Mahmoud Elias', 'Rania Sameh', 'Youssef Maher',
                  'Nada Hesham', 'Sami Tamer', 'Salma Mamdouh', 'Alaa Gamal', 'Ahmad Emad'];

        $cities = ['Cairo', 'Alexandria', 'Giza', 'Shubra El-Kheima', 'Port Said', 'Suez', 'Luxor', 'Aswan', 'Mansoura', 'Tanta'];
        $whereToGo = ['Alexandria','Cairo','Aswan'];
        $x = [1, 2, 3, 4, 5, 6, 7];

        foreach ($names as $name) {
            DB::table('users')->insert([
                'name' => $name,
                'email' => strtolower(str_replace(' ', '', $name)) .$faker->numberBetween(1, 10). '@gmail.com',
                'status' => $faker->randomElement(['worker', 'student']),
                'gender' => $faker->randomElement(['male', 'female']),
                'age' => $faker->numberBetween(18, 45),
                'city' => $faker->randomElement($cities),
                'where_to_go' => $faker->randomElement($whereToGo),
                'phone' => $faker->phoneNumber,
                'photo' => 'https://picsum.photos/id/' . $faker->numberBetween(1, 1000) . '/200/200',
                'password' => Hash::make('123456789'),
                // 'password' => Hash::make($faker->password),
                // 'created_at' => now(),
                // 'updated_at' => now(),
            ]);
        }

        // for ($i = 0; $i < 40; $i++) {
        //     $name = $faker->randomElement($names);
        //     DB::table('users')->insert([
        //         'name' => $name,
        //         // 'email' => strtolower(str_replace(' ', '', $name)) . '@gmail.com',
        //         'email' => strtolower(str_replace(' ', '', $name)) . '2@gmail.com',
        //         'status' => $faker->randomElement(['worker', 'student']),
        //         'gender' => $faker->randomElement(['male', 'female']),
        //         'age' => $faker->numberBetween(18, 45),
        //         'city' => $faker->randomElement($cities),
        //         'where_to_go' => $faker->randomElement($whereToGo),
        //         'phone' => $faker->phoneNumber,
        //         'photo' => 'https://picsum.photos/id/' . $faker->numberBetween(1, 1000) . '/200/200',
        //         'password' => Hash::make('123456789'),
        //         // 'password' => Hash::make($faker->password),
        //         // 'created_at' => now(),
        //         // 'updated_at' => now(),
        //     ]);
        // }
    }

}
