<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           DB::table('areas')->insert([
               'name'=>'北海道',
           ]); 
           
           DB::table('areas')->insert([
               'name'=>'東北',
           ]); 
           
           DB::table('areas')->insert([
               'name'=>'関東',
           ]); 
           
           DB::table('areas')->insert([
               'name'=>'中部',
           ]); 
           
           DB::table('areas')->insert([
               'name'=>'近畿',
           ]); 
           
           DB::table('areas')->insert([
               'name'=>'中国・四国',
           ]); 
           
           DB::table('areas')->insert([
               'name'=>'九州',
           ]); 
           
    }
}
