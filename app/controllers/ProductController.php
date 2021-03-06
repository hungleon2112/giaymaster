<?php

class ProductController extends \BaseController {

    protected $branch;
    protected $category;
    protected $brand;
    protected $product;
    protected $image;
    protected $optional_product;

    public function __construct(Branch $branch,
                                Category $category,
                                Brand $brand,
                                Product $product,
                                Images $image,
                                Optional_Product $optional_product){
        $this->branch = $branch;
        $this->category = $category;
        $this->brand = $brand;
        $this->product = $product;
        $this->image = $image;
        $this->optional_product = $optional_product;
    }

    public function Add()
    {
        $listBranch = $this->branch->GetAllBranch();
        $listBrand = $this->brand->GetAllBrand();
        return View::make('admin.productAdd')->with('listBranch',$listBranch)
                                             ->with('listBrand',$listBrand)
                                             ->with('product', NULL);
    }

    public function PostAdd()
    {
        $input = Input::all();

        $final_input['id'] = $input['id'];
        $final_input['name'] = $input['name'];
        $final_input['category_id'] = $input['category_id'];
        $final_input['brand_id'] = $input['brand'];
        $final_input['size'] = $input['size'];
        $final_input['gender'] = $input['gender'];
        $final_input['price_original'] = str_replace(',','',$input['price_original']);
//        $final_input['price_new'] = $input['price_new'];
        $final_input['description_short'] = $input['description_short'];
        $final_input['description_full'] = $input['description_full'];
        $final_input['code'] = $input['code'];
        $final_input['recommend'] = $input['recommend'];
        try
        {
            if (!isset($final_input['id']) || $final_input['id'] == '') { //Create
                $product = $this->product->create($final_input);
                return $product;
            }
            else //Edit
            {
                $product = Product::find($final_input['id']);
                $product->name = $final_input['name'];
                $product->category_id = $final_input['category_id'];
                $product->brand_id = $final_input['brand_id'];
                $product->size = $final_input['size'];
                $product->gender = $final_input['gender'];
                $product->price_original = str_replace(',','',$final_input['price_original']);
//                $product->price_new = $final_input['price_new'];
                $product->description_short = $final_input['description_short'];
                $product->description_full = $final_input['description_full'];
                $product->code = $final_input['code'];
                $product->recommend = $final_input['recommend'];
                $product->save();
                return $product;
            }
        } catch (Exception $exception) {
            return $exception->getMessage() . $exception->getLine();
        }
    }

    public function GetAllCatLev1FromBranchID(){
        $input = Input::all();
        $listCat = $this->category->GetAllCatLev1FromBranchID($input['branch_id']);
        return $listCat;
    }

    public function GetAllCatFromParentID(){
        $input = Input::all();
        $listCat = $this->category->GetAllCatFromParentID($input['parent_id']);
        return $listCat;
    }

    public function UploadImage()
    {
        if(Input::file())
        {
            $images = Input::file('images');
            foreach($images as $image) {

                //$filename  = time() . '.' . $image->getClientOriginalExtension();
                $filename  = UtilityHelper::guid() . '.' . $image->getClientOriginalExtension();
                $path = public_path('uploads/' . $filename);
                Image::make($image->getRealPath())->save($path);

                $input = Input::all();
                $product_id = $input['id'];

                $final_input['url'] = 'uploads/' . $filename;
                $final_input['product_id'] = $product_id;

                $this->image->create($final_input);
            }
        }
    }

    public function SetMainImage()
    {
        $input = Input::all();
        $img = Images::find($input['image_id']);

        $product_id = $input['product_id'];
        $product = Product::find($product_id);

        $product->main_image_url = $img->url;
        $product->save();
    }

    public function GetAllImage()
    {
        $input = Input::all();
        $listImage = $this->image->GetAllImage($input['product_id']);
        foreach($listImage as $i)
        {
            $i['url'] = $_ENV['Domain_Name'].$i['url'];
        }
        return $listImage;
    }

    public function DeleteImage()
    {
        $input = Input::all();
        $img = Images::find($input['image_id']);
        if(isset($img))
        {
            unlink($img->url);
            $img->delete();
        }
    }

    public function ListProduct()
    {
        $listProduct = $this->product->ListProduct((Session::get('pagination')) != '' ? Session::get('pagination') : 50);
        foreach($listProduct as $p){
            //Get Optional News
            $optional_product_news = $this->optional_product->GetOptionalProductByProductID($_ENV['News'], $p->id);
            if(isset($optional_product_news))
            {
                $p->optional_news = $optional_product_news;
            }

            //Get Optional Sale Off
            $optional_product_sale = $this->optional_product->GetOptionalProductByProductID($_ENV['Sale'], $p->id);
            if(isset($optional_product_sale))
            {
                $p->optional_sale = $optional_product_sale;
            }
        }
        //print_r($listProduct); die();
        return View::make('admin.productList')->with('listProduct',$listProduct);
    }

    public function SetPagination()
    {
        try
        {
            $input = Input::all();
            if(isset($input))
            {
                $pagination = $input['showing'];
                Session::put('pagination', $pagination);
            }
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }


    public function Edit()
    {
        $input = Input::all();
        $product_id = $input['id'];

        $product = $this->product->FindProduct($product_id);

        $listImage = $this->image->GetAllImage($input['id']);
        foreach($listImage as $i)
        {
            $i['url'] = $_ENV['Domain_Name'].$i['url'];
        }

        $listBranch = $this->branch->GetAllBranch();
        $listBrand = $this->brand->GetAllBrand();

        return View::make('admin.productAdd')
            ->with('listBranch',$listBranch)
            ->with('listBrand',$listBrand)
            ->with('product',$product[0])
            ->with('listImage', $listImage);
    }

    public function UpdateListProduct()
    {
        $input = Input::all();
        $listProductID = $input['update_list_product_id'];
        $listProductID = explode(",",$listProductID);
        $input_final['price_new'] = $input['price_new'];
        foreach($listProductID as $p)
        {
            if($input['optional_checkbox_news'] == true)
            {
                $optional_product = new Optional_Product();
                $optional_product->optional_id = 1;
                $optional_product->product_id = $p;
                $optional_product->from_date = $input['from_date_news'];
                $optional_product->to_date = $input['to_date_news'];
                $optional_product->save();
            }

            if($input['optional_checkbox_sale'] == true)
            {
                $optional_product = new Optional_Product();
                $optional_product->optional_id = 2;
                $optional_product->product_id = $p;
                $optional_product->from_date = $input['from_date_sale'];
                $optional_product->to_date = $input['to_date_sale'];
                $optional_product->save();
            }
        }

        $price_new_list = json_decode($input_final['price_new']);

        if(count($price_new_list) > 0 )
        {
            for($i = 0 ; $i < count($price_new_list) ; $i ++)
            {
                $product_id = $price_new_list[$i]->product_id;
                $new_price = str_replace(',','',$price_new_list[$i]->new_price);

                if($new_price != '')
                {
                    $product = Product::find($product_id);
                    $product->price_new = $new_price;
                    $product->save();
                }
            }
        }
    }

    public function DeleteListProduct()
    {
        $input = Input::all();
        $listProductID = $input['delete_list_product_id'];

        DB::table('products')->whereIn('id', explode(",",$listProductID))->delete();

    }


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}



	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
