<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use Carbon\Carbon;


class ReviewSeeder extends Seeder
{
    public function run()
    {
        Review::insert([
            [ 'user_id' => 1,'product_id' => 1, 'rating' => 5, 'comment' => 'Great product, very comfortable!','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['user_id' => 2,'product_id' => 1, 'rating' => 4, 'comment' => 'Good quality, but a bit pricey.','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['user_id' => 3,'product_id' => 2, 'rating' => 3, 'comment' => 'It\'s okay, but not as expected.','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['user_id' => 4,'product_id' => 2, 'rating' => 5, 'comment' => 'Perfect for my living room, love the design!','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['user_id' => 5,'product_id' => 3, 'rating' => 2, 'comment' => 'Not as comfortable as I thought.','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['user_id' => 6,'product_id' => 3, 'rating' => 4, 'comment' => 'Decent product, the color is a bit off though.','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['user_id' => 7,'product_id' => 4, 'rating' => 5, 'comment' => 'Amazing sofa, very cozy!','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['user_id' => 8,'product_id' => 4, 'rating' => 4, 'comment' => 'Looks great, a little hard to clean.','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['user_id' => 9,'product_id' => 5, 'rating' => 5, 'comment' => 'Perfect for my bedroom, great quality!','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['user_id' => 10,'product_id' => 5, 'rating' => 3, 'comment' => 'Good product, but the color faded quickly.','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['user_id' => 11,'product_id' => 6, 'rating' => 4, 'comment' => 'Comfortable, but I expected more durability.','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['user_id' => 12,'product_id' => 6, 'rating' => 5, 'comment' => 'Love this! Looks beautiful and feels great.','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['user_id' => 13,'product_id' => 7, 'rating' => 4, 'comment' => 'Nice product, but the assembly was tricky.','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['user_id' => 14,'product_id' => 7, 'rating' => 5, 'comment' => 'Great for my office, very sturdy!','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['user_id' => 15,'product_id' => 8, 'rating' => 3, 'comment' => 'It\'s fine, but not very comfortable for long hours.','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['user_id' => 16,'product_id' => 8, 'rating' => 4, 'comment' => 'Good, but the cushion could be thicker.','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['user_id' => 17,'product_id' => 9, 'rating' => 5, 'comment' => 'Perfect size for my small space, highly recommend!','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['user_id' => 18,'product_id' => 9, 'rating' => 4, 'comment' => 'Nice piece, though a bit smaller than expected.','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['user_id' => 19,'product_id' => 10, 'rating' => 2, 'comment' => 'It didn\'t last as long as I hoped.','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
               ]);
    }
}
