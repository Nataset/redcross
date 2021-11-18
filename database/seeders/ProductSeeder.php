<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product();
        $product->product_name = "Cleansing Water";
        $product->product_url = "";
        $product->save();

        $product = new Product();
        $product->product_name = "ANTI-ACNE Serum";
        $product->product_url = "";
        $product->save();

        $product = new Product();
        $product->product_name = "Cleansing Gel";
        $product->product_url = "";
        $product->save();

        $product = new Product();
        $product->product_name = "ถุงผ้ำจำกขวดพลำสติก";
        $product->product_url = "";
        $product->save();

        $product = new Product();
        $product->product_name = "แป้งข้ำวหอมมะลิล้วน";
        $product->product_url = "";
        $product->save();

        $product = new Product();
        $product->product_name = "แป้งข้ำวหอมมะลิ สำหรับทำเค้กเนย";
        $product->product_url = "";
        $product->save();

        $product = new Product();
        $product->product_name = "แป้งข้ำวหอมมะลิ  สำหรับทำเค้กเนย";
        $product->product_url = "";
        $product->save();

        $product = new Product();
        $product->product_name = "แป้งข้ำวหอมมะลิ สำหรับทำบราวนี";
        $product->product_url = "";
        $product->save();

        $product = new Product();
        $product->product_name = "ผลิตภัณฑ์ DCL แบบขวด 30 แคปซูล";
        $product->product_url = "";
        $product->save();

        $product = new Product();
        $product->product_name = "ผลิตภัณฑ์ DCL แบบแผง 10 แคปซูล ";
        $product->product_url = "";
        $product->save();
        $product = new Product();
        $product->product_name = "ผลิตภัณฑ์ BRAHMIX (บราห์มิกซ์) ผลิตภัณฑ์ เสริมอำหารเพื่อบำรุงสมองและความจำ";
        $product->product_url = "";
        $product->save();
        $product = new Product();
        $product->product_name = "Assistive Tableware";
        $product->product_url = "";
        $product->save();
        $product = new Product();
        $product->product_name = "ผลิตภัณฑ์ข้าวยีสต์แดง (ขวดสีแดง) ขนาด 60 แคปซูล";
        $product->product_url = "";
        $product->save();
        $product = new Product();
        $product->product_name = "ผลิตภัณฑ์เบต้ากลูแคน (ขวดน้ำเงิน) ขนาด 60 แคปซูล";
        $product->product_url = "";
        $product->save();
        $product = new Product();
        $product->product_name = "Matcha Whip Cleansing Foam โฟมล้างหน้าจากอนุภาคชาเขียว";
        $product->product_url = "";
        $product->save();
        $product = new Product();
        $product->product_name = "ผลิตภัณฑ์ขนมควบคุมน้ำหนักสุนัขเสริมใยอาหารจากผงไบโอไฟเบอร์ - สีส้ม : สูตร ฟักทอง กลิ่นนม";
        $product->product_url = "";
        $product->save();

        $product = new Product();
        $product->product_name = "ผลิตภัณฑ์ขนมควบคุมน้ำหนักสุนัขเสริมใยอาหารจากผงไบโอไฟเบอร์ - สีน ำเงิน : สูตร ผักเคล กลิ่นตับ";
        $product->product_url = "";
        $product->save();

        $product = new Product();
        $product->product_name = "โปรตีนเกษตร";
        $product->product_url = "";
        $product->save();

        $product = new Product();
        $product->product_name = "goody snax";
        $product->product_url = "";
        $product->save();
        $product = new Product();
        $product->product_name = "rice berry";
        $product->product_url = "";
        $product->save();
        $product = new Product();
        $product->product_name = "nu munchee";
        $product->product_url = "";
        $product->save();
        $product = new Product();
        $product->product_name = "goody snax brow rice snack";
        $product->product_url = "";
        $product->save();
    }
}
