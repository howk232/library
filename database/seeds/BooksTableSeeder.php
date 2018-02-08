<?php

use Illuminate\Database\Seeder;
use App\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=1; $i<30; $i++) {
            $book = new Book();
            $book->title = $faker->word(50);
            $book->author = $faker->firstName . ' ' . $faker->LastName;
            $book->date_of_issue = $faker->date('Y-m-d');
            $book->description = $faker->text(300);
            $book->save();
        }
    }
}
