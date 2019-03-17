<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
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
                'name' => 'Vu Ngoc Dang',
                'email' => 'vungocdang@gmail.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Nguyen Dinh Tuan',
                'email' => 'nguyendinhtuan@gmail.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Vu Cong Duy',
                'email' => 'vucongduy@gmail.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Nguyen Viet Thai',
                'email' => 'nguyenvietthai@gmail.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Hoang Trung Kien',
                'email' => 'hoangtrungkien@gmail.com',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($datas as $data) {
            User::create($data);
        }
    }
}
