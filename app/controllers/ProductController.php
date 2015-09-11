<?php

class ProductController extends \BaseController {

    protected $branch;
    protected $category;
    protected $brand;
    protected $product;
    protected $image;

    public function __construct(Branch $branch,
                                Category $category,
                                Brand $brand,
                                Product $product,
                                Images $image){
        $this->branch = $branch;
        $this->category = $category;
        $this->brand = $brand;
        $this->product = $product;
        $this->image = $image;
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
        $final_input['price_original'] = $input['price_original'];
        $final_input['price_new'] = $input['price_new'];

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
                $product->price_original = $final_input['price_original'];
                $product->price_new = $final_input['price_new'];

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
            $image = Input::file('image');
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('uploads/' . $filename);
            Image::make($image->getRealPath())->save($path);

            $input = Input::all();
            $product_id = $input['id'];

            $final_input['url'] = 'uploads/' . $filename;
            $final_input['product_id'] = $product_id;

            $this->image->create($final_input);

        }
    }

    public function GetAllImage()
    {
        $input = Input::all();
        $listImage = $this->image->GetAllImage($input['product_id']);
        foreach($listImage as $i)
        {
            $i['url'] = $_ENV['Domain_Name']."\\".$i['url'];
        }
        return $listImage;
    }

    public function DeleteImage()
    {
        $input = Input::all();
        $img = Images::find($input['image_id']);
        if(isset($img))
            $img->delete();
    }

    public function ListProduct()
    {
        $listProduct = $this->product->ListProduct();
        return View::make('admin.productList')->with('listProduct',$listProduct);
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
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
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
