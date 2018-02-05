<?php

use App\Models\Page;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Page::create([
        'title'       => 'about us',
        'description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).",
        'displays'    => json_encode(['header' => true, 'footer' => true])
      ]);

      $description = " It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.";

    	foreach([1, 2, 3, 4, 5] as $value) {
    		$page = [
    			'title'       => 'test page ' . $value,
    			'description' => 'test page ' . $value . $description,
          'displays'    => json_encode(['header' => true, 'footer' => true])
    		];

    		Page::create($page);
    	}
    }
}
