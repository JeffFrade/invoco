<?php

use Illuminate\Database\Seeder;
use InvOco\Document;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Document::class, 3)->create();
    }
}
