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
        factory(App\User::class,10)->create();

        for($i=0; $i<2; $i++){
            $role =['User','Admin'];
            factory(App\Role::class)->create([
                'id'=>($i+1),
                'name'=>$role[$i],
            ]);
        }
    }
}