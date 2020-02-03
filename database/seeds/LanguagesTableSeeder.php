<?php

use App\Models\Language;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws FileNotFoundException
     */
    public function run()
    {
        if (Schema::hasTable('languages')) {
            DB::table('languages')->delete();
        }

        $json = File::get("database/data/languages.json");
        $data = json_decode($json);
        foreach ($data as $item) {
            Language::create([
                'iso_code' => $item->iso_code,
                'code' => $item->code,
                'name' => $item->name,
                'name_native' => $item->name_native,
                'text_direction' => $item->text_direction,
                'date_format' => $item->date_format,
                'status' => $item->status,
            ]);
        }
    }
}
