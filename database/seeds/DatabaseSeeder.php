<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,3)->create();

        factory(App\User::class, 1)->create(['role_id'=>2])->each(function($u){
            $u->promotion()
                ->saveMany(
                    factory(App\Promotion::class,rand(1,5))->make()
                );
        });
        for($i=0; $i<2; $i++){
            $role =['User','Admin'];
            factory(App\Role::class)->create([
                'id'=>($i+1),
                'name'=>$role[$i],
            ]);
        }


    }
}