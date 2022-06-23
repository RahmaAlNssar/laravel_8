<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

          Permission::create(['name'=>'role-list','name_ar'=>'قائمة الأدوار']);
          Permission::create(['name'=>'role-create','name_ar'=>'إضافة دور']);
          Permission::create(['name'=>'role-edit','name_ar'=>'تعديل دور']);
          Permission::create(['name'=>'role-delete','name_ar'=>'حذف دور']);
      
         
        }
}
