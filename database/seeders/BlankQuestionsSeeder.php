<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BlankQuestionsSeeder extends Seeder
{
    public function run(): void
    {
        $file_path = public_path()."/seeds/blankquestions.json";
        $raw_data = file_get_contents($file_path);
        $json_data = json_decode($raw_data);

        foreach($json_data as $data){
            DB::table('blank_questions')->insert([
                "question" => json_encode($data->question),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]);
        }
    }
}
