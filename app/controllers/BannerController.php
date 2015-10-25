<?php

class BannerController extends \BaseController {

    protected $banner;

    public function __construct(Banner $banner){
        $this->banner = $banner;
    }

    public function Add(){
        return View::make('admin.banner.add');
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

                $banner = Banner::find($input['id']);
                $banner->url =  'uploads/' . $filename;
                $banner->save();
            }
        }
    }

    public function GetAllImage()
    {
        $input = Input::all();
        $banner = Banner::find($input['banner_id']);
        return $banner['url'];
    }

    public function PostAdd(){
        $input = Input::all();
        $final_input['description'] = $input['banner_description_full'];
        try
        {
            if (!isset($input['id']) || $input['id'] == '') { //Create
                $banner = $this->banner->create($final_input);
                return $banner;
            }
            else //Edit
            {
                $banner = Banner::find($input['id']);
                $banner->description = $final_input['description'];
                $banner->save();
                return $banner;
            }
        } catch (Exception $exception) {
            return $exception->getMessage() . $exception->getLine();
        }
    }

    public function ListBanner()
    {
        $listBanner = $this->banner->GetAllBanner(50);

        return View::make('admin.banner.list')->with('listBanner',$listBanner);
    }

    public function DeleteListDiscount()
    {
        $input = Input::all();
        $listDiscountID = $input['delete_list_discount_id'];
        DB::table('discounts')->whereIn('id', explode(",",$listDiscountID))->delete();
    }

    public function Edit()
    {
        $input = Input::all();
        $banner_id = $input['id'];
        $banner = Banner::find($banner_id);
        return View::make('admin.banner.add')
            ->with('banner',$banner);
    }
}
