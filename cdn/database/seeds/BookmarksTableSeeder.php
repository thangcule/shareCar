<?php

use Illuminate\Database\Seeder;
use App\Bookmark;

class BookmarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'choose_pick_up' => 46,
                'choose_drop_off' => 49,
                'walk_pk' => 165,
                'walk_dr' => 0,
                'seats' => 2,
                'price' => 100000,
                'fee' => 5000,
                'status' => 0,
                'user_id' => 1,
                'ride_id' => 1,
            ],
        ];

        foreach ($datas as $data) {
            Bookmark::create($data);
        }
    }
}
