<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Group;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MembersController extends Controller
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
        // Fetch groups from the database
        $groups = Group::all(); // Assuming you have a Group model

        // Return the view with groups data
        return view('dashboard.NewMember', ['groups' => $groups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form input fields
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'surname' => 'required|string|max:255',
            'gender' => 'required|in:M,F',
            'DOB' => 'required|date_format:m/d/Y',
            'telephone' => 'required|unique:members|numeric',
            'email' => 'nullable|unique:members|email|max:255',
            'nearestPrimary' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'town' => 'required|string|max:255',
            'houseNumber' => 'nullable|string|max:255',
            'nearestStreet' => 'required|string|max:255',
            'village' => 'required|string|max:255',
            'groups' => 'nullable|array', // Validate groups as an array
            'groups.*' => 'string|exists:groups,groupName', // Validate each group name exists in the groups table
        ]);

        // Alert the user of the input error
        if ($validator->fails()) {
            session()->flash('error', $validator->messages()->all()[0]);
            return back();
        }

        // Begin database transaction
        DB::beginTransaction();

        try {
            // Save the input data to the database
            $member = new Member();

            $member->firstName = $request->input('firstName');
            $member->middleName = $request->input('middleName');
            $member->surname = $request->input('surname');
            $member->gender = $request->input('gender');
            $member->DOB = Carbon::createFromFormat('m/d/Y', $request->input('DOB'))->format('Y-m-d');
            $member->telephone = $request->input('telephone');
            $member->email = $request->input('email');
            $member->nearestPrimary = $request->input('nearestPrimary');
            $member->address = $request->input('address');
            $member->town = $request->input('town');
            $member->houseNumber = $request->input('houseNumber');
            $member->nearestStreet = $request->input('nearestStreet');
            $member->village = $request->input('village');
            $member->role = 0; // 0-General Member, 1-Administrative Member, 2-Super Admin
            $member->password = Hash::make($request->input('telephone')); // Telephone number will be used as password for first time sign in

            $member->save();

            // Save groups data to the groupMemberships table
            $groupNames = $request->input('groups', []); // Get the groups input, default to empty array if not set
            foreach ($groupNames as $groupName) {
                $group = Group::where('groupName', $groupName)->first();
                DB::table('groupMemberships')->insert([
                    'memberID' => $member->memberID,
                    'groupID' => $group->groupID,
                ]);
            }

            // Commit the transaction
            DB::commit();

            // Success message
            session()->flash('success', 'Member added successfully!');
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollBack();

            // Alert the user of the error
            session()->flash('error', $e->getMessage());
        }

        return back();
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
        //
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
        //
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
}
