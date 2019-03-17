<?php

use Illuminate\Database\Seeder;
use App\Ride;

class RidesTableSeeder extends Seeder
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
                "pick_up" =>  "12",
                "stopover" =>  "14",
                "drop_off" =>  "13",
                "start_date" =>  "2018-11-22",
                "start_time" =>  "00:00:00",
                "seats" =>  "3",
                "sub_path1" =>  "120000",
                "sub_path2" =>  "120000",
                "path" =>  "200000",
                "detail" =>  "null",
                "user_id" =>  "1",
            ],
            [
                "pick_up" =>  "15",
                "stopover" =>  "null",
                "drop_off" =>  "16",
                "start_date" =>  "2018-11-30",
                "start_time" =>  "17:10:00",
                "seats" =>  "3",
                "sub_path1" =>  "0",
                "sub_path2" =>  "0",
                "path" =>  "200000",
                "detail" =>  "null",
                "user_id" =>  "1",
            ],
            [
                "pick_up" =>  "17",
                "stopover" =>  "null",
                "drop_off" =>  "18",
                "start_date" =>  "2018-11-29",
                "start_time" =>  "15:40:00",
                "seats" =>  "3",
                "sub_path1" =>  "0",
                "sub_path2" =>  "0",
                "path" =>  "800000",
                "detail" =>  "null",
                "user_id" =>  "1",
            ],
            [
                "pick_up" =>  "31",
                "stopover" =>  "36",
                "drop_off" =>  "34",
                "start_date" =>  "2018-11-28",
                "start_time" =>  "17:10:00",
                "seats" =>  "3",
                "sub_path1" =>  "50000",
                "sub_path2" =>  "50000",
                "path" =>  "800000",
                "detail" =>  "null",
                "user_id" =>  "4",
            ],
            [
                "pick_up" =>  "31",
                "stopover" =>  "36",
                "drop_off" =>  "34",
                "start_date" =>  "2018-11-27",
                "start_time" =>  "17:10:00",
                "seats" =>  "3",
                "sub_path1" =>  "50000",
                "sub_path2" =>  "50000",
                "path" =>  "800000",
                "detail" =>  "null",
                "user_id" =>  "4",
            ],
            [
                "pick_up" =>  "39",
                "stopover" =>  "41",
                "drop_off" =>  "40",
                "start_date" =>  "2018-11-27",
                "start_time" =>  "16:10:00",
                "seats" =>  "3",
                "sub_path1" =>  "120000",
                "sub_path2" =>  "120000",
                "path" =>  "200000",
                "detail" =>  "null",
                "user_id" =>  "2",
            ],
            [
                "pick_up" =>  "42",
                "stopover" =>  "null",
                "drop_off" =>  "43",
                "start_date" =>  "2018-12-07",
                "start_time" =>  "18:10:00",
                "seats" =>  "3",
                "sub_path1" =>  "0",
                "sub_path2" =>  "0",
                "path" =>  "200000",
                "detail" =>  "Không có khoang chở hàng",
                "user_id" =>  "4",
            ],
            [
                "pick_up" =>  "44",
                "stopover" =>  "null",
                "drop_off" =>  "45",
                "start_date" =>  "2018-12-27",
                "start_time" =>  "15:20:00",
                "seats" =>  "2",
                "sub_path1" =>  "0",
                "sub_path2" =>  "0",
                "path" =>  "800000",
                "detail" =>  "null",
                "user_id" =>  "4",
            ],
            [
                "pick_up" =>  "46",
                "stopover" =>  "49",
                "drop_off" =>  "47",
                "start_date" =>  "2018-12-27",
                "start_time" =>  "18:30:00",
                "seats" =>  "3",
                "sub_path1" =>  "100000",
                "sub_path2" =>  "100000",
                "path" =>  "150000",
                "detail" =>  "null",
                "user_id" =>  "4",
            ]
        ];

        foreach ($datas as $data) {
            Ride::create($data);
        }
    }
}
