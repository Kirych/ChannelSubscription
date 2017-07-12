<?php

use Illuminate\Database\Seeder;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('channels')->delete();

        foreach(range(1, 10) as $index)
            $values[] = ['id_channel' => App\Channel::newId()];
        
        App\Channel::insert($values);
    }

}