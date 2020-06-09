<?php

namespace App\Http\Controllers;

use App\Admission;
use App\Certificate;
use App\PostPrimary;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Redirect;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function start()
    {
        $admission = Admission::whereUserId(auth()->id())->first();
        if(!$admission){
            return view('admission.start');
        }else{
            return Redirect::route('admission.continue');
        }

    }
    public function applicants(){
        if(!auth()->user()->is_admin){
            return redirect()->route('home');
        }
        return view('admin.applicants');
    }
    public function store(Request $request)
    {
        $data = $this->getData($request);
        Admission::create($data);
        return Redirect::route('admission.continue')->with('success', 'Continue with your admission process.');
    }

    public function storePostPrimary(Request $request)
    {
        $data = $this->getPostPrimaryData($request);
        $cert = PostPrimary::create($data);
        return $cert;
    }

    public function storeCert(Request $request)
    {
        $data = $this->getCertData($request);
        $cert = Certificate::create($data);
        return $cert;
    }



    public function continue(){
        $admission = Admission::whereUserId(auth()->id())->first();
        if(!$admission){
            return Redirect::route('admission.start');
        }else{
            $certifications = Certificate::whereAdmissionId($admission->id)->get();
            $post_primaries = PostPrimary::whereAdmissionId($admission->id)->get();
            return view('admission.continue',compact('admission','certifications','post_primaries'));
        }
    }

    public function print(){
        $admission = Admission::whereUserId(auth()->id())->first();
        if(!$admission){
            return Redirect::route('admission.start');
        }else{
            $certifications = Certificate::whereAdmissionId($admission->id)->get();
            $post_primaries = PostPrimary::whereAdmissionId($admission->id)->get();
            return view('admission.print',compact('admission','certifications','post_primaries'));
        }
    }

    public function printSlip($id){
        if(!auth()->user()->is_admin){
            return redirect()->route('home');
        }
        $admission = Admission::findOrFail($id);
        if(!$admission){
            return Redirect::route('admin.dashboard');
        }else{
            $certifications = Certificate::whereAdmissionId($admission->id)->get();
            $post_primaries = PostPrimary::whereAdmissionId($admission->id)->get();
            return view('admission.print',compact('admission','certifications','post_primaries'));
        }
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



    public function edit(Admission $admission)
    {
        //
    }


    public function update(Request $request)
    {
        $data = $this->getUpdateData($request);
        $profile = Admission::whereUserId(auth()->user()->id)->first();
        $profile->update($data);
        return response()->json($data);
    }
    protected function getUpdateData(Request $request)
    {
        $rules = [
            'work_experiences' => 'nullable|array',
            'courses' => 'nullable',
//            'user_id' => 'required|integer',
        ];
        $data = $request->validate($rules);
        return $data;
    }


    public function destroy(Admission $admission)
    {
        //
    }

    public function deletePostPrimary(Request $request)
    {
        PostPrimary::findOrFail($request->id)->delete();
        return response()->json('success');
    }
    protected function getPostPrimaryData(Request $request)
    {
        $rules = [
            'admission_id' => ['required'],
            'name_of_institution' => ['required'],
            'from' => ['required'],
            'to' => ['required'],
            'qualifications' => ['required'],
        ];
        $data = $request->validate($rules);
        return $data;
    }
    protected function getCertData(Request $request)
    {
        $rules = [
            'admission_id' => ['required'],
            'name_of_exam' => ['required'],
            'date_of_exam' => ['required'],
            'exam_number' => ['required'],
        ];
        $data = $request->validate($rules);
        return $data;
    }
    protected function getData(Request $request)
    {
        $rules = [
            'user_id' => ['nullable'],
            'surname' => ['required', 'max:100'],
            'first_name' => ['required'],
            'other_names' => ['nullable'],
            'maiden_name' => ['required'],
            'permanent_home_address' => ['required'],
           'email'=> ['nullable', 'max:50'],
           'g_telephone'=> ['nullable', 'max:50'],
           'r_telephone' => ['required'],
           'nationality' => ['required'],
            'state_of_origin' => ['required'],
            'lga' => ['required'],
           'date_of_birth' => ['required'],
           'sex' => ['required'],
            'marital_status' => ['required'],
            'guardian_name' => ['required'],
            'guardian_occupation' => ['required'],
            'guardian_telephone' => ['required'],
        ];
        $data = $request->validate($rules);
        $data['user_id'] = auth()->id();
        $data['email'] = auth()->user()->email;
        return $data;
    }
}
