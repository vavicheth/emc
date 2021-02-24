<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Accounting',
                'name_kh' => 'គណនេយ្យ',
                'abr' => 'ACC',
                'description' => NULL,
                'number' => 0,
                'is_active' => 1,
                'created_at' => '2021-02-23 11:18:02',
                'updated_at' => '2021-02-23 11:18:02',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Administration',
                'name_kh' => 'រដ្ឋបាល',
                'abr' => 'AD',
                'description' => NULL,
                'number' => 0,
                'is_active' => 1,
                'created_at' => '2021-02-23 11:27:37',
                'updated_at' => '2021-02-23 12:10:50',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'General Contract',
                'name_kh' => 'កិច្ចសន្យាទូទៅ',
                'abr' => 'GC',
                'description' => NULL,
                'number' => 0,
                'is_active' => 1,
                'created_at' => '2021-02-23 11:30:17',
                'updated_at' => '2021-02-23 11:30:17',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'General Operation',
                'name_kh' => 'ប្រត្តិបត្តការទូទៅ',
                'abr' => 'GO',
                'description' => NULL,
                'number' => 0,
                'is_active' => 1,
                'created_at' => '2021-02-23 11:30:50',
                'updated_at' => '2021-02-23 11:30:50',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Marketing',
                'name_kh' => 'ទីផ្សារ',
                'abr' => 'MM',
                'description' => NULL,
                'number' => 0,
                'is_active' => 1,
                'created_at' => '2021-02-23 11:31:22',
                'updated_at' => '2021-02-23 11:31:22',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Staff Contract',
                'name_kh' => 'កិច្ចសន្យាបុគ្គលិក',
                'abr' => 'SC',
                'description' => NULL,
                'number' => 0,
                'is_active' => 1,
                'created_at' => '2021-02-23 11:32:07',
                'updated_at' => '2021-02-23 11:32:07',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}