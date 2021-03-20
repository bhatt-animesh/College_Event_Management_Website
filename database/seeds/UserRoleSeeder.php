<?php

use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $roles=[
    	[
    		'name'=>'admin',
    		'label'=>'Admin'
   		],
   		[
    		'name'=>'user',
    		'label'=>'User'
   		],   		
   	
    ]; 
    public function run()
    {
        foreach ($this->roles as $value) {
      		if(! \Spatie\Permission\Models\Role::where('name',$value['name'])->exists()){
      			\Spatie\Permission\Models\Role::create($value);
      		}
      	}
    }
}
