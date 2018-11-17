<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){

        for($i=0; $i<2; $i++){
            $role =['User','Admin'];
            factory(App\Role::class)->create([
                'id'=>($i+1),
                'name'=>$role[$i],
            ]);
        }

        factory(App\User::class, 1)->create(['role_id'=>2])->each(function($u){
            $u->promotion()
                ->saveMany(
                    factory(App\Promotion::class,rand(1,5))->make()
                );
        });

        for($i=0; $i<4; $i++){
            $status =['รับเข้าระบบ','กำลังซ่อม','ซ่อมเสร็จแล้ว','มารับแล้ว'];
            factory(App\StatusProduct::class)->create([
                'id'=>($i+1),
                'name'=>$status[$i],
            ]);
        }

        factory(App\User::class,3)->create(['role_id'=>1])->each(function ($u){
            $u->tracking()
                ->saveMany(
                    factory(App\Tracking::class,rand(1,3))->make()
                );
        });



    }
}