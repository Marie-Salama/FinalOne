<?php
/*
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GenerateDataset extends Command
{
    protected $signature = 'dataset:generate';

    protected $description = 'Generate recommendation dataset from MySQL database';

    public function handle()
    {
        // Retrieve data from the rentals table
        $rentals = DB::table('rentals')
            ->select('user_id', 'accommodations_id')
            ->get();

        // Initialize an empty array to store the dataset
        $dataset = [];

        // Iterate over the rentals data
        foreach ($rentals as $rental) {
            $user_id = $rental->user_id;
            $accommodations_id = $rental->accommodations_id;

            // Retrieve origin and where_to_go from the users table
            $user = DB::table('users')
                ->select('city as Origin', 'where_to_go')
                ->where('id', $user_id)
                ->first();

            // Retrieve governorate, region, Cairo, and Aswan from the accommodations table
            $accommodation = DB::table('accommodations')
                ->select('governorate', 'region')
                // ->select('governorate', 'region as Alexandria', 'Cairo', 'Aswan')
                ->where('id', $accommodations_id)
                ->first();

            // Add the collected data to the dataset array
            $dataset[] = [
                'User_ID' => $user_id,
                'Origin' => $user->Origin,
                'Alexandria' => $accommodation->Alexandria,
                'Cairo' => $accommodation->Cairo,
                'Aswan' => $accommodation->Aswan,
                // Add other required fields
            ];
        }
        if (empty($dataset)) {
            $this->error('Dataset is empty. No data to generate.');
            return;
        }

        // Save the dataset to a CSV file
        $csvPath = storage_path('app/recommendation_dataset.csv');
        $fp = fopen($csvPath, 'w');
        fputcsv($fp, array_keys($dataset[0])); // Write the header row
        foreach ($dataset as $row) {
            fputcsv($fp, $row);
        }
        fclose($fp);

        $this->info('Dataset generated successfully. File saved to: ' . $csvPath);
    }
}
*/
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GenerateDataset extends Command
{
    protected $signature = 'dataset:generate';
    protected $description = 'Generate recommendation dataset';

    public function handle()
    {
        // Retrieve data from the rentals table
        $rentals = DB::table('rentals')
            ->select('user_id', 'accommodations_id')
            ->get();

        // Initialize an empty array to store the dataset
        $dataset = [];

        // Iterate over the rentals data
        foreach ($rentals as $rental) {
            $user_id = $rental->user_id;
            $accommodations_id = $rental->accommodations_id;

            // Retrieve origin and where_to_go from the users table
            $user = DB::table('users')
                ->select('city as Origin', 'where_to_go')
                ->where('id', $user_id)
                ->first();

            // Retrieve the governorate and region from the accommodations table
            $accommodation = DB::table('accommodations')
                ->select('governorate', 'region')
                ->where('id', $accommodations_id)
                ->first();

            // Create an empty array to store the dataset row
            $row = [
                'User_ID' => $user_id,
                'Origin' => $user->Origin,
                'Alexandria' => null,
                'Cairo' => null,
                'Aswan' => null,
            ];

            // Assign the region value to the corresponding column based on the governorate
            if ($accommodation->governorate === 'Alexandria') {
                $row['Alexandria'] = $accommodation->region;
            } elseif ($accommodation->governorate === 'Cairo') {
                $row['Cairo'] = $accommodation->region;
            } elseif ($accommodation->governorate === 'Aswan') {
                $row['Aswan'] = $accommodation->region;
            }

            // Add the row to the dataset array
            $dataset[] = $row;
        }

        // Check if the dataset is empty
        if (empty($dataset)) {
            $this->error('Dataset is empty. No data to generate.');
            return;
        }

        // Save the dataset to a CSV file
        $csvPath = storage_path('app/recommendation_dataset.csv');
        $fp = fopen($csvPath, 'w');
        fputcsv($fp, array_keys($dataset[0])); // Write the header row
        foreach ($dataset as $row) {
            fputcsv($fp, $row);
        }
        fclose($fp);

        $this->info('Dataset generated successfully. File saved to: ' . $csvPath);
    }
}
