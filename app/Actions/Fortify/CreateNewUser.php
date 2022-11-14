<?php

namespace App\Actions\Fortify;
use App\Models\Donor;
use App\Models\Member;
use App\Models\Partner;
use App\Models\Volunteer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        // Validator::make($input, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => $this->passwordRules(),
        //     'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        // ])->validate();

        // return User::create([
        //     'name' => $input['name'],
        //     'email' => $input['email'],
        //     'password' => Hash::make($input['password']),
        // ]);

        $user = new User();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->phone = $input['phone'];
        $user->address = $input['address'];
        $user->gender = $input['gender'];
        $user->role = $input['role'];
        $user->password = Hash::make($input['password']);
        $user->save();

        if($input['role'] == 'member'){
            $member = new Member();
            $member->member_name = $input['member_name'];
            $member->member_phone = $input['member_phone'];
            $member->member_address = $input['member_address'];
            $member->user_id = $user->id;
            $member->save();
        }

        if($input['role'] == 'partner'){
            $partner = new Partner();
            $partner->partner_address = $input['partner_address'];
            $partner->partner_organization = $input['partnership_organization'];
            $partner->partnership_timeline = $input['partnership_timeline'];
            $partner->user_id = $user->id;
            $partner->save();
        }

        if($input['role'] == 'donor'){
            $donor = new Donor();
            $donor->donation_schedule = $input['donation_schedule'];
            $donor->donation_type = $input['donation_type'];
            $donor->user_id = $user->id;
            $donor->save();
        }

        if($input['role'] == 'volunteer'){
            $volunteer = new Volunteer();
            $volunteer->volunteer_name = $input['volunteer_name']; 
            $volunteer->volunteer_time = $input['volunteer_time'];
            $volunteer->volunteer_available = $input['volunteer_available'];
            $volunteer->user_id = $user->id;
            $volunteer->save();
        }

        
    }
}
