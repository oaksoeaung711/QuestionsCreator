<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MatchingQuestionsSeeder extends Seeder
{
    public function run(): void
    {
        $file_path = public_path()."/seeds/matchingquestions.json";
        $raw_data = file_get_contents($file_path);
        $json_data = json_decode($raw_data);

        foreach($json_data as $data){
            DB::table('matching_questions')->insert([
                "question" => json_encode($data->question),
                "columnA" => json_encode($data->columnA),
                "columnAliststyle" => $data->columnAliststyle,
                "columnB" => json_encode($data->columnB),
                "columnBliststyle" => $data->columnBliststyle,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]);
        }
    }
}
