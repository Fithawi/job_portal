<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Model\Pages;
use Illuminate\Support\Facades\Hash;
use App\Http\Model\AppliedJob;
use App\Http\Model\DynamicPage;
use App\Http\Model\ContactUs;


class FrontUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = User::where('id', $id)->first();
        $aboutus = Pages::find(1);
        $contact = ContactUs::find(1);
        $dynamic_pages = DynamicPage::find(1);
        $appliedJobs = AppliedJob::where('user_id',$id)
            ->leftJoin('jobs','jobs.id','=','applied_jobs.job_id')
            ->leftJoin('users','users.id','=','jobs.recruiter_id')
            ->select('applied_jobs.*','jobs.*','users.name as compnayName')->get();
        return view('front.pages.profile',compact('row','appliedJobs','aboutus','dynamic_pages','contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $data = [
            'name' => $input['name'],
            'email' => $input['email'],
            'mobile' => $input['mobile'],
            'username' => $input['username'],
        ];
        $result = User::where('id', $id)->update($data);
        if ($request->hasFile('user_image')) {
            $image = $request->file('user_image');
            $imagePath = public_path('candidate_image');
            $imageName = md5(time() . '_' . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            $image->move($imagePath, $imageName);
            $imageData = [
                'user_image' => $imageName
            ];
            User::where('id', $id)->update($imageData);
            if ($input['hidden_image'] != '') {
                unlink($imagePath . '/' . $input['hidden_image']);
            }
        }
        if (!empty($result)) {
            session()->flash('success', 'User Personal information Updated!');
            return redirect()->route('index');
        } else {
            session()->flash('error', 'Something wend wrong');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function ChangePassword(Request $request, $id)
    {
        $input = $request->all();
        $data = [
            'password' => Hash::make($input['password'])
        ];
        $result = User::where('id', $id)->update($data);
        if (!empty($result)) {
            session()->flash('success', 'User Password Updated!');
            return redirect()->route('index');
        } else {
            session()->flash('error', 'Something wend wrong');
            return redirect()->back();
        }
    }
}
