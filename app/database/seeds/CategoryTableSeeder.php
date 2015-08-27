<?php
/**
 * Created by PhpStorm.
 * User: Hp 840 G1
 * Date: 8/27/2015
 * Time: 2:14 PM
 */

class CategoryTableSeeder extends Seeder{

    public function run() {
        DB::table('categories')->truncate();


        //1
        $category = new Category();
        $category->name = "Street Style";
        $category->parent_id = 0;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //2
        $category = new Category();
        $category->name = "Running-training";
        $category->parent_id = 0;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //3
        $category = new Category();
        $category->name = "Basketball";
        $category->parent_id = 0;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //4
        $category = new Category();
        $category->name = "Tennis";
        $category->parent_id = 0;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //5
        $category = new Category();
        $category->name = "Sandal";
        $category->parent_id = 0;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //6
        $category = new Category();
        $category->name = "Dép";
        $category->parent_id = 0;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();


        //7
        $category = new Category();
        $category->name = "Adix";
        $category->parent_id = 1;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //8
        $category = new Category();
        $category->name = "Asics Gel";
        $category->parent_id = 1;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //9
        $category = new Category();
        $category->name = "Neo";
        $category->parent_id = 1;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //10
        $category = new Category();
        $category->name = "NB";
        $category->parent_id = 1;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //11
        $category = new Category();
        $category->name = "Rade";
        $category->parent_id = 1;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //12
        $category = new Category();
        $category->name = "Rade R2";
        $category->parent_id = 1;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //13
        $category = new Category();
        $category->name = "Zx";
        $category->parent_id = 1;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //14
        $category = new Category();
        $category->name = "F1";
        $category->parent_id = 1;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //15
        $category = new Category();
        $category->name = "Flex";
        $category->parent_id = 2;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //16
        $category = new Category();
        $category->name = "Giày Cut";
        $category->parent_id = 2;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //17
        $category = new Category();
        $category->name = "Asics Training";
        $category->parent_id = 2;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //18
        $category = new Category();
        $category->name = "Baseketrade";
        $category->parent_id = 3;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //19
        $category = new Category();
        $category->name = "Giày Cut";
        $category->parent_id = 3;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //20
        $category = new Category();
        $category->name = "Adi Tennis";
        $category->parent_id = 4;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //21
        $category = new Category();
        $category->name = "Flex Training";
        $category->parent_id = 15;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //22
        $category = new Category();
        $category->name = "Flex Pro";
        $category->parent_id = 15;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //23
        $category = new Category();
        $category->name = "Dual Fusion";
        $category->parent_id = 16;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //24
        $category = new Category();
        $category->name = "Flex Supreme";
        $category->parent_id = 16;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //25
        $category = new Category();
        $category->name = "T Lite MM";
        $category->parent_id = 16;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //26
        $category = new Category();
        $category->name = "Season";
        $category->parent_id = 16;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //27
        $category = new Category();
        $category->name = "Air Max";
        $category->parent_id = 16;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //28
        $category = new Category();
        $category->name = "Maori";
        $category->parent_id = 16;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //29
        $category = new Category();
        $category->name = "GT";
        $category->parent_id = 17;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //30
        $category = new Category();
        $category->name = "Crazy Beat";
        $category->parent_id = 18;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //31
        $category = new Category();
        $category->name = "Dual Fusion Basketball";
        $category->parent_id = 19;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //32
        $category = new Category();
        $category->name = "Prime Hype";
        $category->parent_id = 19;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //33
        $category = new Category();
        $category->name = "Visi Pro";
        $category->parent_id = 19;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //34
        $category = new Category();
        $category->name = "Air Premier";
        $category->parent_id = 19;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //35
        $category = new Category();
        $category->name = "Zoom";
        $category->parent_id = 19;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //36
        $category = new Category();
        $category->name = "Jordan";
        $category->parent_id = 19;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //37
        $category = new Category();
        $category->name = "Overplay";
        $category->parent_id = 19;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //38
        $category = new Category();
        $category->name = "Kobe";
        $category->parent_id = 19;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //39
        $category = new Category();
        $category->name = "Kobe";
        $category->parent_id = 19;
        $category->Branch()->associate(Branch::where('name','=','Giày dép')->first());
        $category->save();

        //40
        $category = new Category();
        $category->name = "Áo thun";
        $category->parent_id = 0;
        $category->Branch()->associate(Branch::where('name','=','Áo quần')->first());
        $category->save();

        //41
        $category = new Category();
        $category->name = "Áo khoác";
        $category->parent_id = 0;
        $category->Branch()->associate(Branch::where('name','=','Áo quần')->first());
        $category->save();

        //42
        $category = new Category();
        $category->name = "Quần Jogger";
        $category->parent_id = 0;
        $category->Branch()->associate(Branch::where('name','=','Áo quần')->first());
        $category->save();

        //43
        $category = new Category();
        $category->name = "Quần Sweat";
        $category->parent_id = 0;
        $category->Branch()->associate(Branch::where('name','=','Áo quần')->first());
        $category->save();

        //44
        $category = new Category();
        $category->name = "Quần short";
        $category->parent_id = 0;
        $category->Branch()->associate(Branch::where('name','=','Áo quần')->first());
        $category->save();

        //45
        $category = new Category();
        $category->name = "Balance";
        $category->parent_id = 40;
        $category->Branch()->associate(Branch::where('name','=','Áo quần')->first());
        $category->save();

        //46
        $category = new Category();
        $category->name = "Long Tee";
        $category->parent_id = 40;
        $category->Branch()->associate(Branch::where('name','=','Áo quần')->first());
        $category->save();

        //47
        $category = new Category();
        $category->name = "Raglan";
        $category->parent_id = 40;
        $category->Branch()->associate(Branch::where('name','=','Áo quần')->first());
        $category->save();

        //48
        $category = new Category();
        $category->name = "Tank Top";
        $category->parent_id = 40;
        $category->Branch()->associate(Branch::where('name','=','Áo quần')->first());
        $category->save();

        //49
        $category = new Category();
        $category->name = "Print Tee";
        $category->parent_id = 40;
        $category->Branch()->associate(Branch::where('name','=','Áo quần')->first());
        $category->save();

        //50
        $category = new Category();
        $category->name = "Sport Shirt";
        $category->parent_id = 40;
        $category->Branch()->associate(Branch::where('name','=','Áo quần')->first());
        $category->save();

        //51
        $category = new Category();
        $category->name = "Hoodie";
        $category->parent_id = 41;
        $category->Branch()->associate(Branch::where('name','=','Áo quần')->first());
        $category->save();

        //52
        $category = new Category();
        $category->name = "Bomber";
        $category->parent_id = 41;
        $category->Branch()->associate(Branch::where('name','=','Áo quần')->first());
        $category->save();

        //53
        $category = new Category();
        $category->name = "Jacket";
        $category->parent_id = 41;
        $category->Branch()->associate(Branch::where('name','=','Áo quần')->first());
        $category->save();

        //54
        $category = new Category();
        $category->name = "Balo";
        $category->parent_id = 0;
        $category->Branch()->associate(Branch::where('name','=','Phụ kiện')->first());
        $category->save();

        //55
        $category = new Category();
        $category->name = "Túi Gym";
        $category->parent_id = 0;
        $category->Branch()->associate(Branch::where('name','=','Phụ kiện')->first());
        $category->save();

        //56
        $category = new Category();
        $category->name = "Túi trống lớn";
        $category->parent_id = 0;
        $category->Branch()->associate(Branch::where('name','=','Phụ kiện')->first());
        $category->save();

        //57
        $category = new Category();
        $category->name = "Túi xách";
        $category->parent_id = 0;
        $category->Branch()->associate(Branch::where('name','=','Phụ kiện')->first());
        $category->save();

        //58
        $category = new Category();
        $category->name = "Túi rút";
        $category->parent_id = 0;
        $category->Branch()->associate(Branch::where('name','=','Phụ kiện')->first());
        $category->save();

        //59
        $category = new Category();
        $category->name = "Hộp";
        $category->parent_id = 0;
        $category->Branch()->associate(Branch::where('name','=','Phụ kiện')->first());
        $category->save();

        //60
        $category = new Category();
        $category->name = "Vớ";
        $category->parent_id = 0;
        $category->Branch()->associate(Branch::where('name','=','Phụ kiện')->first());
        $category->save();

        //61
        $category = new Category();
        $category->name = "Dây";
        $category->parent_id = 0;
        $category->Branch()->associate(Branch::where('name','=','Phụ kiện')->first());
        $category->save();

        //62
        $category = new Category();
        $category->name = "Nón";
        $category->parent_id = 0;
        $category->Branch()->associate(Branch::where('name','=','Phụ kiện')->first());
        $category->save();
    }
} 