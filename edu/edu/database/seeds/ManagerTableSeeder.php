<?php

use Illuminate\Database\Seeder;

class ManagerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return 生成测试数据
     */
    public function run()
    {
        //引用faker进行创建假数据
        //https://packagist.org/packages/fzaninotto/faker
        //api
        $faker = Faker\Factory::create('zh_CN');//参数提供本地化设置，默认为us
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'username' => $faker->userName,
                'password' => bcrypt('123456'),    //laravel自带加密的一个方法
                'gender' => rand(1, 3),  //随机性别
                'mobile' => $faker->phoneNumber,
                'email' => $faker->email,
                'role_id' => rand(1, 6),
                'created_at' => date('Y-m-d H:i:s'),
                'status' => rand(1, 2)
            ];
        }
        DB::table('manager')->insert($data);

    }
}
