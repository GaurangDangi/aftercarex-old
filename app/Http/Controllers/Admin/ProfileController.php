<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\InstitutionModel;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function institutionProfile(Request $request)
    {
        // Retrieve the authenticated institution
        $institution_id = Auth::guard('institution')->user()->id;

        $institution = InstitutionModel::where(['id'=> $institution_id])->first();
        return view('admin.profile.institution', compact('institution'));
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, string $id)
    {
        $institution = InstitutionModel::find($id);
        $validator = Validator::make($request->all(), [
            'institution_name'    => 'required',
            'industry'            => 'required',
            'registration_no'     => 'required',
            'contact_person_name' => 'required',
            'mobile_no'           => 'required|integer|min:10|unique:institution,mobile_no,'.$id,
            'email_id'            => 'required|email|unique:institution,email_id,'.$id,
            'subscription_price'  => 'required|numeric',
            'address_1'           => 'required',
            'city'                => 'required',
            'state'               => 'required',
            'country'             => 'required',
            'status'              => 'required',
            'total_expected_client' => 'nullable|integer',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $update_data = [
                'institution_name'    => $request->institution_name,
                'industry'            => $request->industry,
                'registration_no'     => $request->registration_no,
                'contact_person_name' => $request->contact_person_name,
                'mobile_no'           => $request->mobile_no,
                'email_id'            => $request->email_id,
                'subscription_price'  => $request->subscription_price,
                'address_1'           => $request->address_1,
                'address_2'           => $request->address_2,
                'city'                => $request->city,
                'state'               => $request->state,
                'country'             => $request->country,
                'status'              => $request->status,
                'total_expected_client' => $request->total_expected_client,
                'company_website'     => $request->company_website,
                'radha'               => $request->radha,
                'white_label_client'  => $request->white_label_client,
                'group_counselors'    => $request->group_counselors,
                'content_creation_access' => $request->content_creation_access
            ];
            if ($request->hasFile('profile')) {
                $image  = $request->file('profile');
                $name = Str::slug(md5(time())).'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/profile');
                $imagePath = $destinationPath. "/". $name;
                $image->move($destinationPath, $name);
                $image_path = 'public/'.$institution['image_url'];
                if(file_exists($image_path)){
                    unlink($image_path);
                }
                $update_data['image_url'] = 'uploads/profile/'.$name;

            }
            InstitutionModel::where('id',$id)->update($update_data);
            return redirect('institution/profile')->with('success', 'Institution updated successfully.');
        }
    }
    
    public function adminProfile(Request $request)
    {
        // Retrieve the authenticated user
        $user_id = Auth::guard('web')->user()->id;
        $adminDetails = User::where(['id'=> $user_id])->first();
        return view('admin.profile.admin', compact('adminDetails'));
    }

    /**
     * Update the specified resource in storage.
    */
    public function updateAdminProfile(Request $request, string $id)
    {
        $user = User::find($id);
        $validator = Validator::make($request->all(), [
            'name'             => 'required',
            'email'            => 'required|email|unique:users,email,'.$id,
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $update_data = [
                'name'             => $request->name,
                'email'            => $request->email,
            ];
            if ($request->hasFile('profile')) {
                $image  = $request->file('profile');
                $name = Str::slug(md5(time())).'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/profile');
                $imagePath = $destinationPath. "/". $name;
                $image->move($destinationPath, $name);
                $image_path = 'public/'.$user['image_url'];
                if(file_exists($image_path)){
                    unlink($image_path);
                }
                $update_data['image_url'] = 'uploads/profile/'.$name;

            }
            User::where('id',$id)->update($update_data);
            return redirect('admin/profile')->with('success', 'Admin Details updated successfully.');
        }
    }

    public function password(Request $request)
    {
        // Retrieve the authenticated user
        $user_id = Auth::guard('web')->user()->id;
        $adminDetails = User::where(['id'=> $user_id])->first();
        return view('admin.profile.password', compact('adminDetails'));
    }

    public function changePassword(Request $request, string $id)
    {
        $user = User::find($id);
        $validator = Validator::make($request->all(), [
            'password'          => 'required',
            'confirm_password'  => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            
            // Update the user's password
            $password = Hash::make($request->password);
            User::where('id',$id)->update(['password' => $password]);

            return redirect('admin/password')->with('success', 'Password changed successfully.');
        }
    }
}
