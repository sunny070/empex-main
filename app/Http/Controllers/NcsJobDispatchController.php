<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use phpseclib3\Crypt\TripleDES;
use App\Models\NcsJobDispatch;
//Added

use App\Models\JobPost as ModelsJobPost;
use App\Models\JobFile;
use Illuminate\Support\Facades\Auth;
use App\Models\JobNco;

class NcsJobDispatchController extends Controller
{

    public function createJobsPost()
  {
    if (auth()->guard('admin')->user()->role_id != 1) {
      abort(401);
    }

    return view('admin.createJobPostNcs');
  }
    
   


    public function submitNCS(Request $req)
    {
        // $req->validate(
        //     [
        //         'title' => 'required',
        //         'category' => 'required',
        //         'files.*' => 'nullable|max:2048',
        //         'type' => 'required',
        //         'sector' => 'required',
        //         'description' => 'required',
        //         'noOfPosts' => 'required',
        //         'dueDate' => 'required',
        //         'organizationName' => 'required',
        //         'nco' => 'required',
        //     ]
        // );
        // if (auth()->guard('admin')->user()->role_id != 1) {
        //   abort(401);
        // }
        // $jobPost = new ModelsJobPost;
        $jobPost = new ModelsJobPost;
        // $jobPost->name = $req->name;
        // $jobPost->email = $req->email;
        // $jobPost->adress = $req->adress;

        $jobPost->title = $req->title;
        $jobPost->category_id = $req->category;
        // $jobPost->slug = Str::slug($this->title, '-');
        $jobPost->type_id = $req->type;
        $jobPost->sector_id = $req->sector;
        $jobPost->description = $req->description;
        $jobPost->no_of_post = $req->noOfPosts;
        $jobPost->organization_name = $req->organizationName;
        $jobPost->due_date_of_submission = $req->dueDate;
        // $jobPost->created_by = Auth::guard('admin')->user()->id;
        $jobPost->published = 1;
        $jobPost->save();

        // foreach ($req->attachments as $file) {
        //     if ($file['file'] !== null) {
        //         $jobFile = new JobFile();
        //         $jobFile->job_post_id = $jobPost->id;
        //         $jobFile->file = $file['file']->storePublicly('job_attachments', 'public');
        //         $jobFile->file_name = $file['file']->getClientOriginalName();
        //         $jobFile->file_size = $req->formatBytes($file['file']->getSize());
        //         $jobFile->save();
        //     }
        // }

        // JobNco::where('job_post_id', $jobPost->id)->delete();
        // foreach ($req->nco as $nco) {
        //     $jobNco = new JobNco();
        //     $jobNco->job_post_id = $jobPost->id;
        //     $jobNco->nco_family_id = $nco;
        //     $jobNco->save();
        // }
        

        return redirect()->route('jobsPost');
    }
}
