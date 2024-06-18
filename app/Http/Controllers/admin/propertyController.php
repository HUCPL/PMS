<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categoryModel;
use App\Models\masterFeaturesModel;
use App\Models\outdoorModel;
use App\Models\indoorModel;
use App\Models\propertyDetails;
use App\Models\onBoardProperty;
use App\Models\propertyImages;
use App\Models\propertyVideos;
use App\Models\ownerDetails;
use App\Models\onBoardProperties;
use App\Models\User;
use App\Models\rentPropertyUnit;
use App\Models\expensesModel;
use Storage;
use Exception;
use App\Events\propertyMail;
use Event;
use View;
use App\Models\permissions;
use Auth;
use App\Models\ticketModel;
use App\Models\propertyUnit;
use App\Models\services;
use App\Models\package;
use App\Models\packageServices;
use App\Models\subUnits;
use App\Models\subUnitFeatures;
use App\Models\sUspecialFeatures;
use App\Models\departments;
use Session;
use App\Models\PropertyIssues;
class propertyController extends Controller
{
   
    //Property Master functions
    public function masterCategory()
    {
        $categoriesDetails = categoryModel::paginate(10);
        return view('backend.master.category')->with(compact('categoriesDetails'));
    }
    public function addMasterCategory(request $request)
    {
        try
        {
            $validate = $request->validate([
                'categoryname'=>'required',
            ],
            [
                'categoryname.required'=>'Category Name is required',
            ]);
            if($validate)
            {
                $categoryNameExist = categoryModel::where('category_name',ucwords($request->categoryname))->exists();
                if($categoryNameExist)
                {
                    return redirect()->back()->with('adminerror','Category Name already exists');
                }
                else
                {
                    if($request->hasfile('categoryImage'))
                    {
                        $image = $request->file('categoryImage');
                        $imageExtension = $image->getClientOriginalExtension();
                        $imageName = bin2hex(random_bytes(4)).'.'.$imageExtension;
                        \Storage::putFileAs('public/uploads/images',$image,$imageName);
                        $url = url('/').Storage::url('uploads/images').'/'.$imageName;
                        $data = [
                            'category_name'=>ucwords($request->categoryname),
                            'category_image'=>$imageName,
                            'image_path'=>$url,
                            'tags'=>$request->tags,
                            'isFeatured'=>$request->isfeatured
                        ];
                    }else
                    {
                        $data = [
                            'category_name'=>ucwords($request->categoryname),
                            'tags'=>$request->tags,
                            'isFeatured'=>$request->isfeatured
                        ];
                    }
                }
                categoryModel::create($data);
                return redirect()->back()->with('adminsuccess','Property Addedd Successfully');
            }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    public function updateMasterCategory(request $request)
    {
        try
        {
            $validate = $request->validate([
                'categoryname'=>'required',
            ],
            [
                'categoryname.required'=>'Category Name is required',
            ]);
            if($validate)
            {
                if($request->hasfile('categoryImage'))
                {
                    $image = $request->file('categoryImage');
                    $imageExtension = $image->getClientOriginalExtension();
                    $imageName = bin2hex(random_bytes(4)).'.'.$imageExtension;
                    \Storage::putFileAs('public/uploads/images',$image,$imageName);
                    $url = url('/').Storage::url('uploads/images').'/'.$imageName;
                    $data = [
                        'category_name'=>$request->categoryname,
                        'category_image'=>$imageName,
                        'image_path'=>$url,
                        'tags'=>$request->tags,
                        'isFeatured'=>$request->isfeatured
                     ];
                }else
                {
                    $data = [
                        'category_name'=>$request->categoryname,
                        'tags'=>$request->tags,
                        'isFeatured'=>$request->isfeatured
                     ];
                }
                
                categoryModel::where('category_id',$request->id)->update($data);
                return redirect()->back()->with('adminsuccess','Category updated Successfully');
            }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    public function deleteMasterCategory($id)
    {
        try
        {
          $delete = categoryModel::where('category_id',$id)->delete();
          $featureListDelete = masterFeaturesModel::where('master_category',$id)->delete();
          $outdoorList = outdoorModel::where('master_category',$id)->delete();
          $indoorList = indoorModel::where('master_category',$id)->delete();
          $propertyDelete = onBoardProperties::where('propertyCategory',$id);
          if($propertyDelete)
          {
            $propertyDelete = $propertyDelete->delete();
          }
          $propdlt =  onBoardProperties::where('propertyCategory',$id);
          if($propdlt)
          {
            $propdlt = $propdlt->first();
          }
        //   $ticketDelete = ticketModel::where('propertyID',$propdlt->id);  
        //   if($ticketDelete)
        //   {
        //     $ticketDelete = $ticketDelete->delete();
        //   }
          return redirect()->back()->with('adminsuccess','PropertyType Move in Trash Successfully');
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    //Property Master Feature List
    public function featureList()
    {
        $categoriesDetails = categoryModel::get();
        $featureList = masterFeaturesModel::with('masterCategory')->paginate(10);
        return view('backend.master.featurelist')->with(compact('categoriesDetails','featureList'));
    }
    public function addFeatureList(request $request)
    {
        try
        {
            $featureNameExist = masterFeaturesModel::where(['features_name'=>ucwords($request->featurename),'master_category'=>$request->category])->exists();
                if($featureNameExist)
                {
                    return redirect()->back()->with('adminerror','Feature Name already exists');
                }
                else
                {
                    $validate = $request->validate([
                        'featurename'=>'required',
                        'category'=>'required'
                    ],
                    [
                        'featurename.required'=>'Feature Name is required',
                        'category'=>'Feature Category is required'
                    ]);
                    if($validate)
                    {
                        
                            $data = [
                                'features_name'=>ucwords($request->featurename),
                                'master_category'=>$request->category,
                                'tags'=>$request->tags,
                            ];
                        
                        masterFeaturesModel::create($data);
                        return redirect()->back()->with('adminsuccess','Feature Addedd Successfully');
                    }
                }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }

    }
    public function updateFeatureList(request $request)
    {
        try
        {
            $validate = $request->validate([
                'featurename'=>'required',
                'category'=>'required'
            ],
            [
                'featurename.required'=>'Feature Name is required',
                'category'=>'Feature Category is required'
            ]);
            if($validate)
            {
                
                $data = [
                    'features_name'=>ucwords($request->featurename),
                    'master_category'=>$request->category,
                    'tags'=>$request->tags,
                ];
                masterFeaturesModel::where('features_id',$request->id)->update($data);
                return redirect()->back()->with('adminsuccess','Feature update Successfully');
            }

        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }

    }
    public function deleteFeatureList($id)
    {
        try
        {
          $delete = masterFeaturesModel::where('features_id',$id)->delete();
          return redirect()->back()->with('adminsuccess','Feature Move in Trash Successfully');
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    //property outDoor List Functions 
    public function propertyOutdoor()
    {
        $categoriesDetails = categoryModel::get();
        $outdoorList = outdoorModel::with('masterCategory')->paginate(10);
        return view('backend.master.outdoor')->with(compact('categoriesDetails','outdoorList'));
    }
    public function addPropertyOutdoor(request $request)
    {
        try
        {
            $outdoorNameExist = outdoorModel::where(['outdoor_name'=>ucwords($request->outdoorname),'master_category'=>$request->category])->exists();
                if($outdoorNameExist)
                {
                    return redirect()->back()->with('adminerror','Outdoor Name already exists');
                }
                else
                {
                    $validate = $request->validate([
                        'outdoorname'=>'required',
                        'category'=>'required'
                    ],
                    [
                        'outdoorname.required'=>'outdoor Name is required',
                        'category'=>'outdoor Category is required'
                    ]);
                    if($validate)
                    {
                        
                            $data = [
                                'outdoor_name'=>ucwords($request->outdoorname),
                                'master_category'=>$request->category,
                                // 'tags'=>$request->tags,
                            ];
                        
                            outdoorModel::create($data);
                        return redirect()->back()->with('adminsuccess','outdoor Addedd Successfully');
                    }
                }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }

    }
    public function updatePropertyOutdoor(request $request)
    {
        try
        { 
            $validate = $request->validate([
                'outdoorname'=>'required',
                'category'=>'required'
            ],
            [
                'outdoorname.required'=>'outdoor Name is required',
                'category'=>'outdoor Category is required'
            ]);
            if($validate)
            {
                
                    $data = [
                        'outdoor_name'=>ucwords($request->outdoorname),
                        'master_category'=>$request->category,
                        // 'tags'=>$request->tags,
                    ];
                
                    outdoorModel::where('outdoor_id',$request->id)->update($data);
                return redirect()->back()->with('adminsuccess','outdoor Addedd Successfully');
            }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }

    }
    public function deletePropertyOutdoor($id)
    {
        try
        {
          $delete = outdoorModel::where('outdoor_id',$id)->delete();
          return redirect()->back()->with('adminsuccess','outdoor Move in Trash Successfully');
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    //property Indoor List Functions
    public function propertyIndoor()
    {
        $categoriesDetails = categoryModel::get();
        $indoorList = indoorModel::paginate(10);
        return view('backend.master.indoor')->with(compact('categoriesDetails','indoorList'));
    }
    public function addPropertyIndoor(request $request)
    {
        try
        {
            $indoorNameExist = indoorModel::where(['indoor_name'=>ucwords($request->indoorname),'master_category'=>$request->category])->exists();
                if($indoorNameExist)
                {
                    return redirect()->back()->with('adminerror','indoor Name already exists');
                }
                else
                {
                    $validate = $request->validate([
                        'indoorname'=>'required',
                        'category'=>'required'
                    ],
                    [
                        'indoorname.required'=>'indoor Name is required',
                        'category'=>'indoor Category is required'
                    ]);
                    if($validate)
                    {
                        
                            $data = [
                                'indoor_name'=>ucwords($request->indoorname),
                                'master_category'=>$request->category,
                                // 'tags'=>$request->tags,
                            ];
                        
                            indoorModel::create($data);
                        return redirect()->back()->with('adminsuccess','indoor Addedd Successfully');
                    }
                }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    public function updatePropertyIndoor(request $request)
    {
        try
        {
            $validate = $request->validate([
                'indoorname'=>'required',
                'category'=>'required'
            ],
            [
                'indoorname.required'=>'indoor Name is required',
                'category'=>'indoor Category is required'
            ]);
            if($validate)
            {
                    $data = [
                        'indoor_name'=>ucwords($request->indoorname),
                        'master_category'=>$request->category,
                        // 'tags'=>$request->tags,
                    ];
                    indoorModel::where('indoor_id',$request->id)->update($data);
                return redirect()->back()->with('adminsuccess','indoor Addedd Successfully');
            }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    public function deletePropertyIndoor($id)
    {
        try
        {
          $delete = indoorModel::where('indoor_id',$id)->delete();
           return redirect()->back()->with('adminsuccess','indoor Move in Trash Successfully');
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    //property Details functions
    public function propertyDetails()
    {
        $propertyDetails = propertyDetails::paginate(10);
        return view('backend.master.propertyDetails')->with(compact('propertyDetails'));
    }
    public function addpropertyDetails(request $request)
    {
        try
        {
                $sqrexist = propertyDetails::where('sqr_meter',$request->sqr_meter)->exists();
                if($sqrexist)
                {
                    return redirect()->back()->with('adminerror','sqr_meter already exists');
                }
                else
                {
                    
                    $validate = $request->validate([
                        'sqr_meter'=>'required',
                        'sqr_feet'=>'required',
                        // 'constructiondate'=>'required',
                        // 'nextrenovation'=>'required',
                        'rooms'=>'required',
                        'floor'=>'required',
                    ]);
                    if($validate)
                    {
                        $data = [
                            'sqr_meter'=>$request->sqr_meter,
                            'sqr_feet'=>$request->sqr_feet,
                            'construction_date'=>$request->constructiondate,
                            'next_renovation'=>$request->nextrenovation,
                            'rooms'=>$request->rooms,
                            'floor'=>$request->floor,
                        ];
                        propertyDetails::create($data);
                        return redirect()->back()->with('adminsuccess','Property Addedd Successfully');
                    }
                }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    public function deletepropertyDetails($id)
    {
        try
        {
           $delete = propertyDetails::where('id',$id)->delete();
           return redirect()->back()->with('adminsuccess','Property Details Move in Trash Successfully');
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    public function updatepropertyDetails(request $request)
    {
        try
        {
                
            $validate = $request->validate([
                'sqr_meter'=>'required',
                'sqr_feet'=>'required',
                'constructiondate'=>'required',
                'nextrenovation'=>'required',
                'rooms'=>'required',
                'floor'=>'required',
            ]);
            if($validate)
            {
                $data = [
                    'sqr_meter'=>$request->sqr_meter,
                    'sqr_feet'=>$request->sqr_feet,
                    'construction_date'=>$request->constructiondate,
                    'next_renovation'=>$request->nextrenovation,
                    'rooms'=>$request->rooms,
                    'floor'=>$request->floor,
                ];
                propertyDetails::where('id',$request->id)->update($data);
                return redirect()->back()->with('adminsuccess','Property Addedd Successfully');
            }
                
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    //Property Owner Details
    public function ownerDetails()
    {
        try
        {
            $ownerDetails =  User::where('role_as',5)->paginate(10);
            return view('backend.onBoard.ownerDetails')->with(compact('ownerDetails'));
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    public function addOwnerDetails(request $request)
    {
        try
        {
            //   dd($request->all());
            $validate = $request->validate([
                'ownername'=>'required',
                'email'=>'required|email',
                'phoneNumber'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
                'address'=>'required',
                'country'=>'required',
                'state'=>'required',
                'city'=>'required',
                'zipCode'=>'required',
            ],['email.required' => 'email must be valid']);
            if($validate)
            { 
                
                $emailExist =  ownerDetails::where('email',$request->email)->withTrashed()->exists();
                $phoneExist =  ownerDetails::where('phone',$request->phoneNumber)->exists();
                if($emailExist)
                {
                    return redirect()->back()->with('adminerror','Email Already exist');
                }elseif($phoneExist)
                {
                    return redirect()->back()->with('adminerror','Phone Already exist');
                }else
                {
                    if($request->hasfile('profileimage'))
                    {
                        $image = $request->file('profileimage');
                        $imageName = $image->getClientOriginalExtension();
                        \Storage::putFileAs('public/uploads',$image,$imageName);
                        $url = \Storage::url('uploads').'/'.$imageName;                    
                    }else
                    {
                        $imageName = "No Image";
                        $url = "No Url";   
                    }
                   $data = [
                        'ownerName' => $request->ownername,
                        'email'=>$request->email,
                        'phone'=>$request->phoneNumber,
                        'address'=>$request->address,
                        'country'=>$request->country,
                        'state'=>$request->state,
                        'city'=>$request->city,
                        'zipcode'=>$request->zipCode,
                        'OwnerId'=>"Owner_ID_".strtoupper(bin2hex(random_bytes(2))),
                        'image_name'=>$imageName,
                        'image_path'=>$url,
                   ];
                   ownerDetails::create($data);
                   return redirect()->back()->with('adminsuccess','Owner Details Added successfully');
                }
              
            }
        }catch(Exception $e)
        {
           return redirect()->back()->with("adminerror",$e->getmessage());
        }
    }
    public function deleteOwnerDetails($id)
    {
        try
        {
              $delete = User::where(['role_as'=>5,'id'=>$id])->delete(); 
              $propdelete = onBoardProperties::where('OwnerID',$id)->delete();
              return redirect()->back()->with('adminsuccess','Successfully Delete Owner');
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    public function updateOwnerDetails(request $request)
    {
        try
        {
            $validate = $request->validate([
                'ownername'=>'required',
                'email'=>'required|email',
                'phoneNumber'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
                'address'=>'required',
                'country'=>'required',
                'state'=>'required',
                'city'=>'required',
                'zipCode'=>'required',
            ],['email.required' => 'email must be valid']);
            if($validate)
            {
                $emailExist =  ownerDetails::where('email',$request->email)->withTrashed()->exists();
                $phoneExist =  ownerDetails::where('phone',$request->phoneNumber)->exists();
                if($emailExist)
                {
                    return redirect()->back()->with('adminerror','Email Already exist');
                }else
                {
                    if($request->hasfile('profileimage'))
                    {
                        $image = $request->file('profileimage');
                        $imageName = bin2hex(random_bytes(2)).'.'.$image->getClientOriginalExtension();
                        \Storage::putFileAs('public/uploads',$image,$imageName);
                        $url = \Storage::url('uploads').'/'.$imageName;                    
                    }else
                    {
                        $imageName = "No Image";
                        $url = "No Url";   
                    }
                    $data = [
                        'ownerName' => $request->ownername,
                        'email'=>$request->email,
                        'phone'=>$request->phoneNumber,
                        'address'=>$request->address,
                        'country'=>$request->country,
                        'state'=>$request->state,
                        'city'=>$request->city,
                        'zipcode'=>$request->zipCode,
                        'image_name'=>$imageName,
                        'image_path'=>$url,
                    ];
                    ownerDetails::where('owner_id',$request->id)->update($data);
                    return redirect()->back()->with('adminsuccess','Owner Details updates successfully');
               }
              
            }
        }catch(Exception $e)
        {
           return redirect()->back()->with("adminerror",'something went wrong');
        }
    }
    //Property OnBoard 
    public function propertyOnBoard()
    {
        $categoriesDetails = categoryModel::get();
        $propertyOnBoard = onBoardProperties::with('masterCategory','ownerDetails','packages')->paginate(10);
        $onwerDetails = User::where('role_as',5)->get();
        $packages= package::where('isDeleted',0)->get();
        $services = services::where('parent_id','=',0)->get();
        $subServices = services::where('parent_id','!=',0)->get();
        return view('backend.onBoard.onboardProperty')->with(compact('propertyOnBoard','categoriesDetails','onwerDetails','packages','services','subServices'));
    }
    //ajax functions
    public function featuresbycategories($id)
    {
            
            $outfeatures = outdoorModel::where('master_category',$id)->get();
            if($outfeatures->isNotEmpty())
            {
                foreach ($outfeatures as  $featurevalue) {
                    echo '<input type="checkbox" name="outdoor[]" id="cb'.$featurevalue->outdoor_id.'" class="outdoor"  value="'.$featurevalue->outdoor_name.'"/><label for="cb'.$featurevalue->outdoor_id.'"  class="label">'.$featurevalue->outdoor_name.'</label> ';
                }
            }else
            {
                echo '<span>No outdoor Features</span>';
            }
    }
    public function proputlFeatures($id)
    {
            $propertyUtly = masterFeaturesModel::where('master_category',$id)->get();
            if($propertyUtly->isNotEmpty())
            {
                foreach ($propertyUtly as  $featurevalue) {
                    echo '<input type="checkbox" name="proputl[]" id="cb'.$featurevalue->features_id.'" class="proputl" value="'.$featurevalue->features_name.'"/><label for="cb'.$featurevalue->features_id.'"  class="label">'.$featurevalue->features_name.'</label> ';
                }
            }else
            {
                echo '<span>No property Utility</span>';
            }    
    }
    public function indoorcatFeatures($id)
    {
        $propertyUtly = indoorModel::where('master_category',$id)->get();
        if($propertyUtly->isNotEmpty())
        {
            foreach ($propertyUtly as  $featurevalue) {
                echo '<input type="checkbox" name="indoor[]" id="cb'.$featurevalue->indoor_id.'" value="'.$featurevalue->indoor_name.'" class="indoor" /><label for="cb'.$featurevalue->indoor_id.'"  class="label">'.$featurevalue->indoor_name.'</label> ';
            }
        }else
        {
            echo '<span>No indoor Features</span>';
        }
        
    }
    //ajax functions end here
    //ajax function for update 
    public function featuresbycategoriess($id)
    {
            
            $outfeatures = outdoorModel::where('master_category',$id)->get();
            if($outfeatures->isNotEmpty())
            {
                foreach ($outfeatures as  $featurevalue) {
                    echo '<input type="checkbox" name="outdoor[]" id="cb'.$featurevalue->outdoor_id.'" class="outdoor" value="'.$featurevalue->outdoor_name.'"/><label for="cb'.$featurevalue->outdoor_id.'"  class="label">'.$featurevalue->outdoor_name.'</label> ';
                    // echo $outdoorfeature;
                }
            }else
            {
                echo '<span>No outdoor Features</span>';
            }
    }
    public function proputlFeaturess($id)
    {
            $propertyUtly = masterFeaturesModel::where('master_category',$id)->get();
            if($propertyUtly->isNotEmpty())
            {
                foreach ($propertyUtly as  $featurevalue) {
                    echo '<input type="checkbox" name="proputl[]" id="cb'.$featurevalue->features_id.'" class="proputl" value="'.$featurevalue->features_name.'"/><label for="cb'.$featurevalue->features_id.'"  class="label">'.$featurevalue->features_name.'</label> ';
                }
            }else
            {
                echo '<span>No property Utility</span>';
            }    
    }
    public function indoorcatFeaturess($id)
    {
        $propertyUtly = indoorModel::where('master_category',$id)->get();
        if($propertyUtly->isNotEmpty())
        {
            foreach ($propertyUtly as  $featurevalue){
                echo '<input type="checkbox" name="indoor[]" id="cb'.$featurevalue->indoor_id.'" class="indoor"  value="'.$featurevalue->indoor_name.'" /><label for="cb'.$featurevalue->indoor_id.'"  class="label">'.$featurevalue->indoor_name.'</label> ';
            }
           
        }else
        {
            echo '<span>No indoor Features</span>';
        }
        
    }
    //End here
    public function addPropertiesOnBoard(request $request)
    {
        try
        {   
            
            $validate = $request->validate([
                'propertyname'=>'required',
                'property_for'=>'required',
                'category'=>'required',
                'sqr_meter'=>'required',
                'sqr_Feet'=>'required',
                // 'cons_date'=>'required',
                // 'renova_date'=>'required',
                'start_date'=>'required',
                'end_date'=>'required',
                'rooms'=>'required',
                'Floor'=>'required',
                'owner'=>'required',
                'propertyImages'=>'required', 
                'country'=>'required',
                'email'=>'required|email',
                'state'=>'required',
                'city'=>'required',
                'pincode'=>'required',
                'propertyAddress'=>'required',   
                // 'nearby'=>'required', 
                // 'packages'=>'required'             
            ]);
            if($validate)
            {
                
                if($request->hasfile('propertyImages'))
                {
                   $images = $request->file('propertyImages');
                   foreach ($images as $image) {
                     $imageExtension = $image->getClientOriginalExtension();
                     $imageName = bin2hex(random_bytes(2)).'.'.$imageExtension;
                     \Storage::putFileAs('public/uploads/images',$image,$imageName);
                     $imageNameArray[] = $imageName;
                     $imageURlArray[] = \Storage::url('uploads/images').'/'.$imageName;
                   }
                   
                }
                if(!empty($request->proputl))
                {
                    $propertyutl = implode(',',$request->proputl);
                }else
                {
                    $propertyutl = '';
                }
                if(!empty($request->outdoor))
                {
                    $outdoor = implode(',',$request->outdoor);
                }else
                {
                    $outdoor = '';
                }
                if(!empty($request->indoor))
                {
                    $indoor = implode(',',$request->indoor);
                }else
                {
                    $indoor = '';
                }
                $propid = 'prop'.bin2hex(random_bytes(2));
                $data = [
                   'propertyName'=>$request->propertyname,
                   'propertyCategory'=>$request->category,
                   'property_for'=>$request->property_for,
                   'sqr_meter'=>$request->sqr_meter,
                   'sqr_feet'=>$request->sqr_Feet,
                   'construction_year'=>$request->cons_date,
                   'renovation_year'=>$request->renova_date,
                   'aggrement_start_date'=>$request->start_date,
                   'aggrement_end_date'=>$request->end_date,
                   'rooms'=>$request->rooms,
                   'floor'=>$request->Floor,
                   'property_utility'=>$propertyutl,
                   'outdoor_features'=>$outdoor,
                   'indoor_feature'=>$indoor,
                   'file_name'=>implode(',',$imageNameArray),
                   'file_path'=>implode(',',$imageURlArray),
                   'OwnerID'=> $request->owner,
                   'propertyAddress'=>$request->propertyAddress,
                   'country'=>$request->country,
                   'city'=>$request->city,
                   'zipcode'=>$request->pincode,
                   'state'=>$request->state,
                   'phone'=>$request->Number,
                   'email'=>$request->email,
                   'near_by'=>implode(',',$request->nearby),
                   'propUniqueID'=>$propid,
                   'aggrement_id'=>'Aggremnt_ID_'.strtoupper(bin2hex(random_bytes(4))),
                   'packagesID'=> $request->packages,
                   'isApproved'=>1,
                   //    'buildup'=>$request->builduparea,
                   //    'coverup'=>$request->coveruparea,
                ];
                $ownerData = User::where(['role_as'=>5,'id'=>$request->owner])->first();
                $eventData =[
                     'Name'=>$ownerData->name,
                     'Email'=>$ownerData->email,
                     'ccEmail'=>$request->email,
                     'title'=>'Hi',
                     'TicketNo'=>'',
                     'messagess'=>'',
                     'Message'=>'I wanted to inform you that we have successfully received your property submission for onboarding. Our team is currently reviewing the details of your property, and we will get back to you as soon as the review process is completed.
                     Thank you for choosing our platform to list your property. We appreciate your trust in our services. If you have any questions or need further assistance during this process, please do not hesitate to reach out to our support team at info@pms.com.',
                ];
                // if(!empty($request->issues))
                // {
                //     $propisuues = explode(',',$request->issues);
                //     foreach($propisuues as $issus)
                //     {
                //         $issues = [
                //              'propUniqueID'=> $propid,
                //              'property_issues'=>$issus
                //         ];
                //         PropertyIssues::create($issues);
                //     }
                // }
                Event::dispatch(new propertyMail($eventData));
                onBoardProperties::create($data);
                // if($request->property_for == 0 || $request->property_for == 2)
                // {
                //     $validate = $request->validate([
                //         'unitname'=>'required',
                //         'bedroom'=>'required',
                //         'BATH'=>'required',
                //         'kitchen'=>'required',
                //         'general'=>'required',
                //         'latefees'=>'required',
                //         'adult'=>'required',
                //         'child'=>'required',
                //         'rentype'=>'required',
                //         'leasestartdate'=>'required',
                //         'leaseenddate'=>'required',
                //         'Payduedate'=>'required',
                //     ]);
                //     if($validate)
                //     {
                //         if($request->hasfile('propertyDocuments'))
                //         {
                //            $imagesD = $request->file('propertyDocuments');
                //            foreach ($imagesD as $imageD) {
                //              $imageExtensionD = $imageD->getClientOriginalExtension();
                //              $imageNameD = bin2hex(random_bytes(2)).'.'.$imageExtensionD;
                //              \Storage::putFileAs('public/uploads/images',$imageD,$imageNameD);
                //              $imageNameArrayD[] = $imageNameD;
                //              $imageURlArrayD[] = \Storage::url('uploads/images').'/'.$imageNameD;
                //            } 
                //         }
                //         $data = [
                //              'propertyID' => $propid,
                //              'bed_rooms'=>$request->bedroom,
                //              'bath'=>$request->BATH,
                //              'kitchen'=>$request->kitchen,
                //              'general_rent'=>$request->general,
                //              'security_deposite'=>$request->securitydeposite,
                //              'late_fee'=>$request->latefees,
                //              'adult' =>$request->adult,
                //              'child'=>$request->child,
                //              'rent_type'=>$request->rentype,
                //              'lease_start_date'=>$request->leasestartdate,
                //              'lease_end_date'=>$request->leaseenddate,
                //              'pay_due_date'=>$request->Payduedate,
                //              'file_name'=>implode(',',$imageNameArrayD),
                //              'file_path'=>implode(',',$imageURlArrayD),
                //         ];
                //         rentPropertyUnit::create($data);
                //     }
                // }
                // return redirect()->back()->with('adminsuccess','property onBorad successfully');
                return redirect('owner/property-unit/'.$propid)->with(['adminsuccess'=>'property onBorad successfully! Please Add Property Unit','propid'=>$propid]);
            }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    public function propertyOnBoardList()
    {
        try
        {
            $onBoardProperties = onBoardProperties::with('masterCategory','ownerDetails','packages','units','subUnits')->paginate(10);
            $packages= package::where('isDeleted',0)->get();
            $services = services::where('parent_id','=',0)->get();
            $subServices = services::where('parent_id','!=',0)->get();
            $departmentData = departments::get();
            return view('backend.onBoard.onBoardList')->with(compact('onBoardProperties','packages','services','departmentData','subServices')); 
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    public function approvedPropList()
    {
        try
        {
            $onBoardProperties = onBoardProperties::with('masterCategory','ownerDetails','packages','units','subUnits')->where('isApproved',0)->paginate(10);
            $packages= package::where('isDeleted',0)->get();
            $subServices = services::where('parent_id','!=',0)->get();
            $services = packageServices::where('isDeleted',0)->get();
            return view('backend.onBoard.onBoardList')->with(compact('onBoardProperties','packages','services','subServices')); 
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    public function pmsPropList()
    {
        try
        {
            $onBoardProperties = onBoardProperties::with('masterCategory','ownerDetails','packages','units','subUnits')->where(['property_for'=>1])->paginate(10);
            $key = 'pms';
            $packages= package::where('isDeleted',0)->get();
            // $services = packageServices::where('isDeleted',0)->get();
            $services = services::where('parent_id','=',0)->get();
            $subServices = services::where('parent_id','!=',0)->get();
            return view('backend.onBoard.onBoardList')->with(compact('onBoardProperties','key','packages','services','subServices')); 
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    public function rentPropList()
    {
        try
        {
            $onBoardProperties = onBoardProperties::with('masterCategory','ownerDetails','packages','units','subUnits')->where(['property_for'=>0])->paginate(10);
            $key = 'rent';
            $packages= package::where('isDeleted',0)->get();
            $services = services::where('parent_id','=',0)->get();
            $subServices = services::where('parent_id','!=',0)->get();
            return view('backend.onBoard.onBoardList')->with(compact('onBoardProperties','key','packages','services','subServices')); 
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    public function deletePropertyOnBoard($id)
    {
        try
        {
           
            $propid = onBoardProperties::where('id',$id)->first();
            $unitDelete = rentPropertyUnit::where('propertyID',$propid->propUniqueID);
            if($unitDelete)
            {
                $unitDelete = $unitDelete->delete();
            }
            $expensesDelete =  expensesModel::where('propertyID',$id);
            onBoardProperties::where('id',$id)->delete();
            ticketModel::where('propertyID',$id)->delete();
            if($expensesDelete)
            {
               $expensesDelete = $expensesDelete->delete();
            }
            return redirect()->back()->with('adminsuccess','successfully delete property');
        }catch(Exception $e)
        {
           return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    public function updatePropertyOnBoard($id)
    {
        try
        {
            $updateOnBaord = onBoardProperties::with('ownerDetails','masterCategory')->where('id',$id)->first(); 
            $onwerDetails = User::where('role_as',5)->get();
            $categoriesDetails = categoryModel::get();
            $packages= package::where('isDeleted',0)->get();
            return view('backend.onBoard.updateonBoard')->with(compact('updateOnBaord','categoriesDetails','onwerDetails','packages'));
        }catch(Exception $e)
        {
            return redirect()->back()->with("adminerror","something went wrong");
        }
    }
    public function updateOnBoard(request $request,$id)
    {
        try
        {   
            // dd($request->all());
            $validate = $request->validate([
                'propertyname'=>'required',
                'property_for'=>'required',
                'category'=>'required',
                'sqr_meter'=>'required',
                'sqr_Feet'=>'required',
                // 'cons_date'=>'required',
                // 'renova_date'=>'required', 
                'start_date'=>'required',
                'end_date'=>'required',
                'rooms'=>'required',
                'Floor'=>'required',
                'owner'=>'required',                
            ]);
            if($validate)
            {
               
                if($request->hasfile('propertyImages'))
                {
                   $images = $request->file('propertyImages');
                   foreach ($images as $image) {
                     $imageExtension = $image->getClientOriginalExtension();
                     $imageName = bin2hex(random_bytes(2)).'.'.$imageExtension;
                     \Storage::putFileAs('public/uploads/images',$image,$imageName);
                     $imageNameArray[] = $imageName;
                     $imageURlArray[] = \Storage::url('uploads/images').'/'.$imageName;
                   } 
                   if(!empty($request->proputl))
                    {
                        $propertyutl = implode(',',$request->proputl);
                    }else
                    {
                        $propertyutl = '';
                    }
                    if(!empty($request->outdoor))
                    {
                        $outdoor = implode(',',$request->outdoor);
                    }else
                    {
                        $outdoor = '';
                    }
                    if(!empty($request->indoor))
                    {
                        $indoor = implode(',',$request->indoor);
                    }else
                    {
                        $indoor = '';
                    }
                   $data = [
                    'propertyName'=>$request->propertyname,
                    'propertyCategory'=>$request->category,
                    'property_for'=>$request->property_for,
                    'sqr_meter'=>$request->sqr_meter,
                    'sqr_feet'=>$request->sqr_Feet,
                    'construction_year'=>$request->cons_date,
                    'renovation_year'=>$request->renova_date,
                    'aggrement_start_date'=>$request->start_date,
                    'aggrement_end_date'=>$request->end_date,
                    'rooms'=>$request->rooms,
                    'floor'=>$request->Floor,
                    'property_utility'=>$propertyutl,
                    'outdoor_features'=>$outdoor,
                    'indoor_feature'=>$indoor,
                    'file_name'=>implode(',',$imageNameArray),
                    'file_path'=>implode(',',$imageURlArray),
                    'OwnerID'=> $request->owner,
                    'propertyAddress'=>$request->propertyAddress,
                    'country'=>$request->country,
                    'city'=>$request->city,
                    'zipcode'=>$request->pincode,
                    'state'=>$request->state,
                    'phone'=>$request->Number,
                    'email'=>$request->email,
                    'near_by'=>implode(',',$request->nearby),
                    // 'aggrement_id'=>'Aggremnt_ID_'.strtoupper(bin2hex(random_bytes(4))),
                    'packagesID'=> $request->packages,
                    // 'isApproved'=>1,
                    
                 ];
                }else
                {
                    if(!empty($request->proputl))
                    {
                        $propertyutl = implode(',',$request->proputl);
                    }else
                    {
                        $propertyutl = '';
                    }
                    if(!empty($request->outdoor))
                    {
                        $outdoor = implode(',',$request->outdoor);
                    }else
                    {
                        $outdoor = '';
                    }
                    if(!empty($request->indoor))
                    {
                        $indoor = implode(',',$request->indoor);
                    }else
                    {
                        $indoor = '';
                    }
                    $data = [
                        'propertyName'=>$request->propertyname,
                        'propertyCategory'=>$request->category,
                        'property_for'=>$request->property_for,
                        'sqr_meter'=>$request->sqr_meter,
                        'sqr_feet'=>$request->sqr_Feet,
                        'construction_year'=>$request->cons_date,
                        'renovation_year'=>$request->renova_date,
                        'aggrement_start_date'=>$request->start_date,
                        'aggrement_end_date'=>$request->end_date,
                        'rooms'=>$request->rooms,
                        'floor'=>$request->Floor,
                        'property_utility'=>$propertyutl,
                        'outdoor_features'=>$outdoor,
                        'indoor_feature'=>$indoor,
                        'OwnerID'=> $request->owner,
                        'propertyAddress'=>$request->propertyAddress,
                        'country'=>$request->country,
                        'city'=>$request->city,
                        'zipcode'=>$request->pincode,
                        'state'=>$request->state,
                        'phone'=>$request->Number,
                        'email'=>$request->email,
                        'near_by'=>implode(',',$request->nearby),
                        'packagesID'=> $request->packages,
                        // 'owner_id'=> $request->owner,
                     ];
                }
                
                onBoardProperties::where('id',$id)->update($data);
                return redirect()->back()->with('adminsuccess','onBorad property Edited successfully');
            }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    // property Trash function
    public function propertyTrash()
    {
        try
        {
            $onBoardProperties = onBoardProperties::with('masterCategory','ownerDetails')->onlyTrashed()->paginate(10);
            return view('backend.recycleBin.propertiesTrash')->with(compact('onBoardProperties')); 
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    public function propertyTrashRestore($id)
    {
        try
        {
           
            onBoardProperties::where('id',$id)->restore();
            ticketModel::where('propertyID',$id)->restore();
            $expensesRestore =  expensesModel::where('propertyID',$id);
            if($expensesRestore)
            {
               $expensesRestore = $expensesRestore->restore();
            }
            return redirect()->back()->with('adminsuccess','successfully restore property');
        }catch(Exception $e)
        {
           return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    public function propertyForceDelete($id)
    {
        try
        {
           
            onBoardProperties::where('id',$id)->forceDelete();
            ticketModel::where('propertyID',$id)->forceDelete();
            $expensesDelete =  expensesModel::where('propertyID',$id);
            if($expensesDelete)
            {
                $expensesDelete = $expensesDelete->forceDelete();
            }
            return redirect()->back()->with('adminsuccess','Property Permanent Delete');
        }catch(Exception $e)
        {
           return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    //unit on Board 
   public function propertyUnit($prop)
   {
       try
       {
              $propertyUnit =  rentPropertyUnit::with('property')->where(['propertyID'=>$prop])->paginate(10);
              $onBoardProperties = onBoardProperties::get();
              $ownerDetails = User::where('role_as',5)->get();
              $pp = $prop;
              return view('backend.onBoard.unit')->with(compact('propertyUnit','onBoardProperties','ownerDetails','pp'));
       }catch(Exception $e)
       {
           return redirect()->back()->with("adminerror",$e->getmessage());
       }
   }
   public function unitOnBoard()
   {
       try
       {
            $ownerDetails = User::where('role_as',5)->get();
            if(Auth::user()->role_as == 5)
            {
                $onBoardProperties = onBoardProperties::where('ownerID',Auth::Id())->get();
                $propid = onBoardProperties::where('ownerID',Auth::Id())->pluck('propUniqueID')->toArray();
                $propertyUnit =  rentPropertyUnit::with('property')->whereIn('propertyID',$propid)->paginate(10);
            }else
            {
            $onBoardProperties = onBoardProperties::get();
            $propertyUnit =  rentPropertyUnit::with('property')->paginate(10);
            }
            return view('backend.onBoard.unitonBoard')->with(compact('propertyUnit','onBoardProperties','ownerDetails'));
       }catch(Exception $e)
       {
           return redirect()->back()->with("adminerror",$e->getmessage());
       }
   }
   public function addPropertyUnit(request $request)
   {
     try
     {
           $validate = $request->validate([
            //  'Owner'=>'required',
            //  'property'=>'required',
             'unitname'=>'required',
             'bedroom'=>'required',
             'BATH'=>'required',
             'kitchen'=>'required',
             'general'=>'required',
             'securitydeposite'=>'required',
             'latefees'=>'required',
             'adult'=>'required',
             'child'=>'required',
             'rentype'=>'required',
             'propertyDocuments'=>'required',
             'propid'=>'required',
           ]);
           if($validate)
           {
            if($request->hasfile('propertyDocuments'))
            {
               $imagesD = $request->file('propertyDocuments');
               foreach ($imagesD as $imageD) {
                 $imageExtensionD = $imageD->getClientOriginalExtension();
                 $imageNameD = bin2hex(random_bytes(2)).'.'.$imageExtensionD;
                 \Storage::putFileAs('public/uploads/images',$imageD,$imageNameD);
                 $imageNameArrayD[] = $imageNameD;
                 $imageURlArrayD[] = \Storage::url('uploads/images').'/'.$imageNameD;
               } 
            }
            // if($request->hasfile('propertyDocuments'))
            // {
            //    $FrontimagesD = $request->file('propertyDocuments');
            //    foreach ($FrontimagesD as $frontimageD) {
            //      $frontimageExtensionD = $frontimageD->getClientOriginalExtension();
            //      $frontimageNameD = bin2hex(random_bytes(2)).'.'.$frontimageExtensionD;
            //      \Storage::putFileAs('public/uploads/images',$frontimageD,$frontimageNameD);
            //      $frontimageNameArrayD[] = $frontimageNameD;
            //      $frontimageURlArrayD[] = \Storage::url('uploads/images').'/'.$frontimageNameD;
            //    } 
            // }
             $data = [
                'propertyID' => $request->propid,
                // 'bed_rooms' => $request->Owner,
                'unit_name'=>$request->unitname,
                'bed_rooms'=>$request->bedroom,
                'bath'=>$request->BATH,
                'kitchen'=>$request->kitchen,
                'general_rent'=>$request->general,
                'security_deposite'=>$request->securitydeposite,
                'late_fee'=>$request->latefees,
                'adult'=>$request->adult,
                'child'=>$request->child,
                'rent_type'=>$request->rentype,
                'lease_start_date'=>$request->leasestartdate,
                'lease_end_date'=>$request->leaseenddate,
                'pay_due_date'=>$request->Payduedate,
                'file_name'=>implode(',',$imageNameArrayD),
                'file_path'=>implode(',',$imageURlArrayD)
             ];
            //  dd($request->all());
             rentPropertyUnit::create($data);
             return redirect()->back()->with(['adminsuccess'=>'Unit onBoard Successfully','propId'=>$request->propid]);
            //  return redirect('owner/sub-unit/'.$request->propid)->with(['adminsuccess'=>'Unit onBoard Successfully','propId'=>$request->propid]);
           }
     }catch(Exception $e)
     {
        return redirect()->back()->with('adminerror',$e->getmessage());
     }
   }
   public function updatePropertyUnit($id)
   {
        try
        {
            $propertyUnits =  rentPropertyUnit::with('property')->first();
            $propertyUnit =  rentPropertyUnit::with('property')->paginate(10);
            $units = rentPropertyUnit::with('property')->where('id',$id)->first();
            $onBoardProperties = onBoardProperties::get();
            $ownerDetails = User::where('role_as',5)->get();
            return view('backend.onBoard.updateunit')->with(compact('propertyUnit','propertyUnits','onBoardProperties','ownerDetails','units'));
        }catch(Exception $e)
        {
            return redirect()->back()->with("adminerror",$e->getmessage());
        }
   }
   public function editPropertyUnit(request $request)
   {
       try
       {
        if($request->hasfile('propertyDocuments'))
        {
           $imagesD = $request->file('propertyDocuments');
           foreach ($imagesD as $imageD) {
             $imageExtensionD = $imageD->getClientOriginalExtension();
             $imageNameD = bin2hex(random_bytes(2)).'.'.$imageExtensionD;
             \Storage::putFileAs('public/uploads/images',$imageD,$imageNameD);
             $imageNameArrayD[] = $imageNameD;
             $imageURlArrayD[] = \Storage::url('uploads/images').'/'.$imageNameD;
           } 
           $data = [
            'unit_name'=>$request->unitname,
            'bed_rooms'=>$request->bedroom,
            'bath'=>$request->BATH,
            'kitchen'=>$request->kitchen,
            'general_rent'=>$request->general,
            'security_deposite'=>$request->securitydeposite,
            'late_fee'=>$request->latefees,
            'adult'=>$request->adult,
            'child'=>$request->child,
            'rent_type'=>$request->rentype,
            'lease_start_date'=>$request->leasestartdate,
            'lease_end_date'=>$request->leaseenddate,
            'pay_due_date'=>$request->Payduedate,
            'file_name'=>implode(',',$imageNameArrayD),
            'file_path'=>implode(',',$imageURlArrayD)
         ];
        }else
        {

            $data = [
               'unit_name'=>$request->unitname,
               'bed_rooms'=>$request->bedroom,
               'bath'=>$request->BATH,
               'kitchen'=>$request->kitchen,
               'general_rent'=>$request->general,
               'security_deposite'=>$request->securitydeposite,
               'late_fee'=>$request->latefees,
               'adult'=>$request->adult,
               'child'=>$request->child,
               'rent_type'=>$request->rentype,
               'lease_start_date'=>$request->leasestartdate,
               'lease_end_date'=>$request->leaseenddate,
               'pay_due_date'=>$request->Payduedate,
            ];
        }
         rentPropertyUnit::where('id',$request->id)->update($data);
         return redirect()->back()->with('adminsuccess','Unit onBoard Successfully');
       }catch(Exception $e)
       {
           return redirect()->back()->with("adminerror",$e->getmessage());
       }
   }
   public function deletePropertyUnit($id)
   {
        try
        {
           $delete = rentPropertyUnit::where('id',$id)->delete();
           return redirect()->back()->with('adminsuccess','Property Unit Delete Successfully');
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
   }
   //Sub units functions
   public function subUnitOnBoard()
   {
    try
    {
        $ownerDetails = User::where('role_as',5)->get();
        $rentUnit =  rentPropertyUnit::with('property')->get();
        $propertyUnit =  subUnits::with('property','units')->where(['isDeleted'=>0])->paginate(10);
        if(Auth::user()->role_as == 5)
        {
            $onBoardProperties = onBoardProperties::where('ownerID',Auth::Id())->get();
            $userID = User::where('id',Auth::Id())->first();
            $userProperties = onBoardProperties::where('ownerID',$userID)->pluck('propUniqueID')->toArray();
            $propertyUnit =  subUnits::with('property','units')->where(['isDeleted'=>0])->whereIn('propID',$userProperties)->paginate(10);
        }else
        {
            $onBoardProperties = onBoardProperties::get();
            $propertyUnit =  subUnits::with('property','units')->where(['isDeleted'=>0])->paginate(10);
        }
        return view('backend.onBoard.subunit')->with(compact('rentUnit','propertyUnit','ownerDetails','onBoardProperties'));
    }catch(Exception $e)
    {
        return redirect()->back()->with("adminerror",$e->getmessage());
    }
   }
   public function addSubUnitOnBoard(request $request)
   {

        try
        {
            $validate = $request->validate([
                'unitname'=> 'required',
                'unitID'=> 'required',
                'propid' => 'required'
            ]);
            if($validate)
            {
            if($request->hasfile('propertyDocuments'))
            {
                $imagesD = $request->file('propertyDocuments');
                foreach ($imagesD as $imageD) {
                    $imageExtensionD = $imageD->getClientOriginalExtension();
                    $imageNameD = bin2hex(random_bytes(2)).'.'.$imageExtensionD;
                    \Storage::putFileAs('public/uploads/images',$imageD,$imageNameD);
                    $imageNameArrayD[] = $imageNameD;
                    $imageURlArrayD[] = \Storage::url('uploads/images').'/'.$imageNameD;
                } 
                $data['file_name'] = implode(',',$imageNameArrayD);
                $data['file_path']= implode(',',$imageURlArrayD);
            }
                $subUnitID = bin2hex(random_bytes(2));
                $data['subUnitID'] = $subUnitID;
                $data['unitID'] = $request->unitID;
                $data['unit_name'] = $request->unitname;
                $data['appartments'] = $request->apprtment;
                $data['rooms_no'] = $request->roomsno;
                $data['sqr_meter'] = $request->sqr_meter;
                $data['sqr_feet'] = $request->sqr_feet;
                $data['area'] = $request->area;
                $data['bath'] = $request->bath;
                $data['features'] = $request->features;
                $data['special_features'] = $request->special_features;
                $data['bhk'] = $request->bhk;
                $data['isAc'] = $request->ac;
                $data['isFurnished'] = $request->furnished;
                $data['general_rent'] = $request->general;
                $data['security_deposite'] = $request->securitydeposite;
                $data['late_fees'] = $request->latefees;
                $data['adult'] = $request->adult;
                $data['child'] = $request->child;
                $data['lease_start_date'] = $request->leasestartdate;
                $data['lease_end_date'] = $request->leaseenddate;
                $data['pay_due_date'] = $request->Payduedate;
                $data['rent_type'] = $request->Payduedate;
                $data['propID'] = $request->propid;
                if(!empty($request->features))
                {
                    $features = explode(',',$request->features);
                    for($i=0; $i < count($features);$i++)
                    {
                        $datas = [
                            'subUnitID'=>$subUnitID,
                            'features'=>$features[$i],
                        ];
                        subUnitFeatures::create($datas);
                    }
                    
                }
                if(!empty($request->special_features))
                {
                    $specialFeatures = explode(',',$request->special_features);
                    for($i=0; $i < count($specialFeatures);$i++)
                    {
                        $datass = [
                            'subUnitID'=>$subUnitID,
                            'features'=>$specialFeatures[$i],
                        ];
                        sUspecialFeatures::create($datass);
                    }
                }
                subUnits::create($data);
                return redirect()->back()->with('adminsuccess','Sub Unit onBoard Successfully');
            }
        }catch(Exception $e)
        {
        return redirect()->back()->with('adminerror',$e->getmessage());
        }
   }
   public function subUnitsOnBoard($ppid)
   {
     try
     {
        $rentUnit =  rentPropertyUnit::with('property')->where(['id'=>$ppid])->get();
        $propertyUnit = subUnits::with('property','units')->where(['unitID'=>$ppid,'isDeleted'=>0])->paginate(10);
        $propid = $ppid;
        return view('backend.onBoard.subunit')->with(compact('rentUnit','propertyUnit','propid'));
     }catch(Exception $e)
     {
         return redirect()->back()->with('adminerror',$e->getmessage());
     }
   }
   public function updateSubUnitOnBoard($id,$ppid)
   {
     try
     {
        $rentUnit =  rentPropertyUnit::with('property')->where('id',$ppid)->get();
        $propertyUnit = subUnits::with('property','units')->where(['unitID'=>$ppid,'isDeleted'=>0])->paginate(10);
        $updatesubUnit = subUnits::with('property','units')->where(['id'=>$id,'isDeleted'=>0])->first();
         return view('backend.onBoard.updatesubunit',compact('rentUnit','propertyUnit','updatesubUnit'));
     }catch(Exception $e)
     {
         return redirect()->back()->with('adminerror',$e->getmessage());
     }
   }
   public function editSubUnitOnBoard(request $request)
   {
        try
        {
            if($request->hasfile('propertyDocuments'))
            {
                $imagesD = $request->file('propertyDocuments');
                foreach ($imagesD as $imageD) {
                    $imageExtensionD = $imageD->getClientOriginalExtension();
                    $imageNameD = bin2hex(random_bytes(2)).'.'.$imageExtensionD;
                    \Storage::putFileAs('public/uploads/images',$imageD,$imageNameD);
                    $imageNameArrayD[] = $imageNameD;
                    $imageURlArrayD[] = \Storage::url('uploads/images').'/'.$imageNameD;
                } 
                $data['file_name'] = implode(',',$imageNameArrayD);
                $data['file_path']= implode(',',$imageURlArrayD);
            }
                // dd($request->all());
                $data['unitID'] = $request->unitID;
                $data['unit_name'] = $request->unitname;
                $data['appartments'] = $request->apprtment;
                $data['rooms_no'] = $request->roomsno;
                $data['sqr_meter'] = $request->sqr_meter;
                $data['sqr_feet'] = $request->sqr_feet;
                $data['area'] = $request->area;
                $data['bath'] = $request->bath;
                $data['features'] = $request->features;
                $data['bhk'] = $request->bhk;
                $data['isAc'] = $request->ac;
                $data['isFurnished'] = $request->furnished;
                $data['general_rent'] = $request->general;
                $data['security_deposite'] = $request->securitydeposite;
                $data['late_fees'] = $request->latefees;
                $data['adult'] = $request->adult;
                $data['child'] = $request->child;
                $data['lease_start_date'] = $request->leasestartdate;
                $data['lease_end_date'] = $request->leaseenddate;
                $data['pay_due_date'] = $request->Payduedate;
                $data['rent_type'] = $request->rentype;
                subUnits::where('id',$request->id)->update($data);
                return redirect()->back()->with('adminsuccess','Edit Sub Unit onBoard Successfully');
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }  
   }
   public function deleteSubUnitsOnBoard($id)
   {
        try
        {
           $delete = subUnits::where('id',$id)->update(['isDeleted'=>1]);
           return redirect()->back()->with('adminsuccess','Property Sub Unit Delete Successfully');
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
   }
}
