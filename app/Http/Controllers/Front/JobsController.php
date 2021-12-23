<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\Job;
use App\Http\Model\Categories;
use App\Http\Model\Contracts;
use App\Http\Model\Experience_Levels;
use App\Http\Model\AppliedJob;
use App\Http\Model\Pages;
use App\Http\Model\DynamicPage;
use App\Http\Model\ContactUs;
use Auth;


class JobsController extends Controller
{
    public function __construct(){
        $this->Job=new Job();
    }
    public function index(Request $request)
    {
        $input = $request->all(); 
        $experience = Experience_Levels::all();
        $search_categories =Categories::all();
        $job_listing  = $this->Job->GetJobListing($input)->where('status',1);
        $aboutus = Pages::find(1);
        $dynamic_pages = DynamicPage::find(1);
        $contact = ContactUs::find(1);

        return view('front.pages.jobs',compact('search_categories','job_listing','experience','aboutus','dynamic_pages','contact'));
    }

    public function details($id){
        $categories = [];
        $is_applied = 0;
        $search_categories =Categories::all();
        $all_categories =Categories::where('parent_id',0)->get();
        foreach($all_categories as $row){
            $pare = $row->category_name;
            $sub_cat = Categories::where('parent_id',$row->id)->get();
            foreach($sub_cat as $scat){
                $categories[$scat->parent_id][$row->id] = $pare;
                $categories[$scat->parent_id][$scat->id] = "-".$scat->category_name;
            }
        }
        $details = Job::where('jobs.id',$id)->leftJoin('experience_levels',function($join){
            $join->on('experience_levels.id','=','jobs.experience_level_id');
        })->leftJoin('categories',function($categories) use($id){
            $categories->on('categories.id','=','jobs.category_id');
        })->leftJoin('contracts',function($contracts) use($id){
            $contracts->on('contracts.id','=','jobs.contracts_id');
        })->leftJoin('working_hours',function($working_hours) use($id){
            $working_hours->on('working_hours.id','=','jobs.working_hours_id');
        })->select('jobs.*','experience_levels.from_year','experience_levels.to_year','categories.category_name','contracts.title as contract_title','working_hours.no_of_hours')->first();
        $aboutus = Pages::find(1);
        $dynamic_pages = DynamicPage::find(1);
        $contact = ContactUs::find(1);

        if(isset(Auth::user()->id)){
            $appliedJobs = AppliedJob::where('user_id',Auth::user()->id)->where('job_id',$id)->count();
            if($appliedJobs > 0){
                $is_applied = 1;
            }
        }
        return view('front.pages.jobdetails',compact('details','categories','is_applied','aboutus','dynamic_pages','contact'));
    }

    public function create()
    {
        $isauthenticated = 0;
        if (Auth::check())
        {
            $isauthenticated = 1;
            return view('front.pages.create');

        }else{
            $isauthenticated = 0;
            return response()->json(['isauthenticated'=>$isauthenticated]);
        }  
    }
    public function store(Request $request)
    {
        $uid = Auth::guard('web')->user()->id;
        // dd($uid);
        $file = $request->hasFile('resume');
        if($file){
            $filename = $request->file('resume');
            $filePath = public_path('/Resumes/');
            if (!file_exists($filePath)) {
                mkdir($filePath, 0775, true);
            }
            $fileName = md5(time() . '_' . $filename->getClientOriginalName()) . '.' . $filename->getClientOriginalExtension();
            
            $filename->move($filePath,$fileName);

            $applyforJob = AppliedJob::create([
            'job_id'=>$request->job_id,
            'user_id'=>$uid,
            'resume'=>$fileName
            ]);
            if($applyforJob){
                 return response()->json(['error'=>false,'msg'=>"Successfully added"]);
                 return redirect()->route('front.jobdetails');
            }else{
                 return response()->json(['error'=>true,'msg'=>"Something went wrong"]);
            }
        }
    }
   
}