<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Group;
use App\Models\Member;
use App\DataTables\MembersDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\DataTables\MembersDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(MembersDataTable $dataTable)
    {
        return $dataTable->render('dashboard.AllMembers');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Fetch groups from the database
        $groups = Group::all();

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
            'firstName' => 'required|string|max:20',
            'middleName' => 'nullable|string|max:20',
            'surname' => 'required|string|max:20',
            'gender' => 'required|in:M,F',
            'DOB' => 'required|date_format:m/d/Y',
            'telephone' => 'required|unique:members|numeric',
            'email' => 'nullable|unique:members|email|max:45',
            'nearestPrimary' => 'required|string|max:100',
            'address' => 'required|string|max:45',
            'town' => 'required|string|max:100',
            'houseNumber' => 'nullable|string|max:100',
            'nearestStreet' => 'required|string|max:100',
            'village' => 'required|string|max:100',
            'groups' => 'nullable|array', // Validate groups as an array
            'groups.*' => 'string|exists:groups,groupName', // Validate each group name exists in the groups table
        ]);

        // Alert the user of the input error
        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => $validator->messages()->all()[0], // Return the first error message
                ],
                422,
            ); // HTTP 422 Unprocessable Entity
        } else {
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
                return response()->json([
                    'status' => 'success',
                    'message' => 'Member added successfully!',
                ]);
            } catch (\Exception $e) {
                // Rollback the transaction if an error occurs
                DB::rollBack();

                // Alert the user of the error
                return response()->json(
                    [
                        'status' => 'error',
                        'message' => $e->getMessage(),
                    ],
                    500,
                );
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $groups = Group::all(); // Fetch groups for the edit form
        return view('', compact('member', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        // Validate the form input fields
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:20',
            'middleName' => 'nullable|string|max:20',
            'surname' => 'required|string|max:20',
            'gender' => 'required|in:M,F',
            'DOB' => 'required|date_format:m/d/Y',
            'telephone' => 'required|numeric',
            'email' => 'nullable|email|max:45',
            'nearestPrimary' => 'required|string|max:100',
            'address' => 'required|string|max:45',
            'town' => 'required|string|max:100',
            'houseNumber' => 'nullable|string|max:100',
            'nearestStreet' => 'required|string|max:100',
            'village' => 'required|string|max:100',
            'groups' => 'nullable|array', // Validate groups as an array
            'groups.*' => 'string|exists:groups,groupName', // Validate each group name exists in the groups table
        ]);

        // Alert the user of the input error
        if ($validator->fails()) {
            return back()
                ->with('toast_error', $validator->messages()->all()[0])
                ->withInput();
        }

        // Begin database transaction
        DB::beginTransaction();

        try {
            // Update the member data
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
            $member->save();

            // Sync group memberships
            DB::table('groupMemberships')
                ->where('memberID', $member->memberID)
                ->delete(); // Remove existing memberships
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
            return back()->with('toast_success', 'Member record updated successfully!');
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollBack();

            // Alert the user of the error
            return back()->with('toast_error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        // Begin database transaction
        DB::beginTransaction();

        try {
            // Delete the member
            $member->delete();

            // Delete associated group memberships
            DB::table('groupMemberships')
                ->where('memberID', $member->memberID)
                ->delete();

            // Commit the transaction
            DB::commit();

            // Success message
            return back()->with('toast_success', 'Member record deleted successfully!');
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollBack();

            // Alert the user of the error
            return back()->with('toast_error', $e->getMessage());
        }
    }
}
