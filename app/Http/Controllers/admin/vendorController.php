<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;
use App\Models\permissions;
use Auth;
use Exception;
use App\Models\vendorCategory;
use App\Models\brandModel;
use Storage;
class vendorController extends Controller
{
   public function vendorCategory()
   {
      try
      {
          $categoriesDetails = vendorCategory::with('brandName')->where('ParentCategoryID',"=",0)->paginate(10);
          $brands = brandModel::where('Active/Inactive',0)->get();
          return view('backend.inventory.category',compact('categoriesDetails','brands'));
      }catch(Exception $e)
      {
          return redirect()->back()->with('adminerror','something went wrong');
      }
   }
   public function addVendorCategory(request $request)
   {
     try
     {
          $validate = $request->validate([
            'categoryname'=>'required',
          ]);
          if($validate)
          {
             $catExists = vendorCategory::where('categoryName', strtoupper($request->categoryname))->exists();
            if($catExists)
            {
              return redirect()->back()->with('adminerror','Category Name alreadyExists');
            }else
            {  
              $data['categoryName'] = strtoupper($request->categoryname);
              $data['brandID'] = $request->brandId;
              if($request->hasfile('categoryImage'))
              {
                 $image = $request->file('categoryImage');
                 $imageName = bin2hex(random_bytes(4)).'.'.$image->getClientOriginalExtension();
                 \Storage::putFileAs('public/uploads',$image,$imageName);
                 $ImageUrl = \Storage::url('uploads').'/'.$imageName; 
                 $data['file_name'] = $imageName;
                 $data['file_path']= $ImageUrl;
              }
              vendorCategory::create($data);
              return redirect()->back()->with('adminsuccess','category Added successfully');
            }
          }
     }catch(Exception $e)
     {
       return redirect()->back()->with('adminerror',$e->getmessage());
     }
   }
   public function updateVendorCategory(request $request)
   {
    try
    {
         $validate = $request->validate([
           'categoryname'=>'required',
         ]);
         if($validate)
         {
             $data['categoryName'] = strtoupper($request->categoryname);
             $data['brandID'] = $request->brandId;
             if(isset($request->parentCat))
             {
               $data['ParentCategoryID'] = $request->parentCat;
             }
             if($request->hasfile('categoryImage'))
             {
                $image = $request->file('categoryImage');
                $imageName = bin2hex(random_bytes(4)).'.'.$image->getClientOriginalExtension();
                \Storage::putFileAs('public/uploads',$image,$imageName);
                $ImageUrl = \Storage::url('uploads').'/'.$imageName; 
                $data['file_name'] = $imageName;
                $data['file_path']= $ImageUrl;
             }
             vendorCategory::where('categoryID',$request->id)->update($data);
             return redirect()->back()->with('adminsuccess','Category update successfully');
         }
    }catch(Exception $e)
    {
      return redirect()->back()->with('adminerror',$e->getmessage());
    }
   }
   public function deleteVendorCategory($id)
   {
      try
      {
            $delete = vendorCategory::where('CategoryID',$id);
            if($delete)
            {
              $delete = $delete->delete();
            }
            $subCategory = vendorCategory::where('ParentCategoryID',$id);
            if($subCategory)
            {
               $subCategory = $subCategory->delete();
            }
            return redirect()->back()->with('adminsuccess','vendorSubCategory Deleted successfully');
      }catch(Exception $e)
      {
         return redirect()->back()->with('adminerror',$e->getmessage());
      }
   }
   //Products Brands
   public function productsBrand()
   {
     try
     {
         $brandDetails = brandModel::where('Active/Inactive',0)->paginate(10);
         return view('backend.inventory.brand',compact('brandDetails'));
     }catch(Exception $e)
     {
       return redirect()->back()->with('adminerror',$e->getmessage());
     }
   }
   public function addProductsBrand(request $request)
   {
    try
    {
         $validate = $request->validate([
           'categoryname'=>'required',
         ]);
         if($validate)
         {
            $catExists = brandModel::where('brandName', strtoupper($request->categoryname))->exists();
           if($catExists)
           {
             return redirect()->back()->with('adminerror','Brand Name alreadyExists');
           }else
           {  
             $data['brandName'] = strtoupper($request->categoryname);
             if($request->hasfile('categoryImage'))
             {
                $image = $request->file('categoryImage');
                $imageName = bin2hex(random_bytes(4)).'.'.$image->getClientOriginalExtension();
                \Storage::putFileAs('public/uploads',$image,$imageName);
                $ImageUrl = \Storage::url('uploads').'/'.$imageName; 
                $data['file_name'] = $imageName;
                $data['file_path'] = $ImageUrl;
             }
             brandModel::create($data);
             return redirect()->back()->with('adminsuccess','Brand Added successfully');
           }
         }
    }catch(Exception $e)
    {
      return redirect()->back()->with('adminerror',$e->getmessage());
    }
   }
   public function updateProductsBrand(request $request)
   {
    try
    {
         $validate = $request->validate([
           'categoryname'=>'required',
         ]);
         if($validate)
         {
             $data['brandName'] = strtoupper($request->categoryname);
             if($request->hasfile('categoryImage'))
             {
                $image = $request->file('categoryImage');
                $imageName = bin2hex(random_bytes(4)).'.'.$image->getClientOriginalExtension();
                \Storage::putFileAs('public/uploads',$image,$imageName);
                $ImageUrl = \Storage::url('uploads').'/'.$imageName; 
                $data['file_name'] = $imageName;
                $data['file_path'] = $ImageUrl;
             }
             brandModel::where('brandID',$request->id)->update($data);
             return redirect()->back()->with('adminsuccess','Brand Details Updated successfully');
         }
    }catch(Exception $e)
    {
      return redirect()->back()->with('adminerror',$e->getmessage());
    }
   }
   public function deleteProductsBrand($id)
   {
      try
      {
            $delete = brandModel::where('brandID',$id);
            if($delete)
            {
              $delete = $delete->delete();
            }
            return redirect()->back()->with('adminsuccess','Brand Deleted successfully');
      }catch(Exception $e)
      {
         return redirect()->back()->with('adminerror',$e->getmessage());
      }
   }
   //Sub Category Functions 
   public function vendorSubCategory()
   {
      try
      {
          $categoriesDetails = vendorCategory::with('parentCategory')->where('ParentCategoryID','!=',0)->paginate(10);
          $catgories = vendorCategory::get();
          return view('backend.inventory.subcategory',compact('categoriesDetails','catgories'));
      }catch(Exception $e)
      {
        return redirect()->back()->with('adminerror','something went wrong');
      }
   }
   //sub vendor category
   public function addVendorsubCategory(request $request)
   {
    try
    {
        
         $validate = $request->validate([
           'categoryname'=>'required',
         ]);
         if($validate)
         {
            $catExists = vendorCategory::where('categoryName', strtoupper($request->categoryname))->exists();
           if($catExists)
           {
             return redirect()->back()->with('adminerror','Category Name alreadyExists');
           }else
           {  
             $data['categoryName'] = strtoupper($request->categoryname);
             $data['ParentCategoryID'] = $request->parentCat; 
             if($request->hasfile('categoryImage'))
             {
                $image = $request->file('categoryImage');
                $imageName = bin2hex(random_bytes(4)).'.'.$image->getClientOriginalExtension();
                \Storage::putFileAs('public/uploads',$image,$imageName);
                $ImageUrl = \Storage::url('uploads').'/'.$imageName; 
                $data['file_name'] = $imageName;
                $data['file_path']= $ImageUrl;
             }
             vendorCategory::create($data);
             return redirect()->back()->with('adminsuccess','subCategory Added Successfully');
           }
         }
    }catch(Exception $e)
    {
      return redirect()->back()->with('adminerror',$e->getmessage());
    }
   }
   //vendor Products
   public function vendorProducts()
   {
     try
     {
        $categories = vendorCategory::get();
        $brands = brandModel::get();
        return view('backend.inventory.products',compact('categories','brands'));
     }catch(Exception $e)
     {
       return \redirect()->back()->with('adminerror','something went wrong');
     }
   }
   public function addVendorProducts(request $request)
   {
       try
       {
           $validate = $request->validate([
             'productname'=>'required',
             'categoryID'=>'required',
             'BrandID'=>'required',
             'skuno'=>'required',
             'productQuantity'=>'required',
             'mainImage'=>'required',
           ]);
           if($validate)
           {
              if($request->hasfile('mainImage'))
              {
                 $mainImage = $request->file('mainImage');
                 $mainImageName = bin2hex(random_bytes(4)).'.'.$mainImage->getClientOriginalExtension();
                 \Storage::putFileAs('public/uploads',$mainImage,$mainImageName);
                 $mainurl = \Storage::url('uploads').'/'.$mainImageName;
                 $data['main_file_name'] = $mainImageName;
                 $data['main_file_path'] = $mainurl;
              }
              if($request->hasfile('productsImages'))
              {
                $images = $request->file('productsImages');
                foreach($images as $prodImages)
                {
                  $imagesNames = bin2hex(random_bytes(4)).'.'.$prodImages->getClientOriginalExtension();
                  \Storage::putFileAs('public/uploads',$prodImages,$imagesNames);
                  $mainurl = \Storage::url('uploads').'/'.$imagesNames;
                  $imgName[] = $imagesNames;
                  $imgurl[] = $mainurl;
                }
                $data['file_name']= implode(',',$imgName);
                $data['file_path']= implode(',',$imgurl);
              }
              $produniqueId = bin2hex(random_bytes(4));
              $data['vendorID'] = Auth::Id();
              $data['prodID'] = $produniqueId;
              $data['brandID']=  $request->BrandID;
              $data['ProductName']=$request->productname;
              $data['description']=$request->description;
              $data['tags']=$request->tags;
              $data['categoryID']=$request->categoryID;
              $data['mrp_price']=$request->saleamount;
              $data['price']=$request->amount;
              $data['SKU']=$request->skuno;
              dd($data);
           }
       }catch(Exception $e)
       {
         return redirect()->back()->with('adminerror',$e->getmessage());
       }
   }
}
