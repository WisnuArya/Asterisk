<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\UpdateProfileRequest;
use Validator;
use Auth;
use Image;

class ProfileController extends Controller
{

    public function update_avatar(Request $request){

        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
        
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        
        return view('profile.edit', array('user' => Auth::user()) );
        }
    

    

    // public function profile(){
    // 	return view('profile', array('user' => Auth::user()) );
    // }

    /**
     * Show the update profile page.
     *
     * @param  Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user()
        ]);
    }

    /**
 * Update user's profile
 *
 * @param  UpdateProfileRequest $request
 * @return \Illuminate\Contracts\Support\Renderable
 */
public function update(UpdateProfileRequest $request)
{
//     $this->validate($request,[
//         'name' => 'required|max:255',
//         'email' => 'required|min:3|max:20|unique:users',
//         'password' => 'required|min:6|confirmed',
//       ]);

//       Auth::user()->update([
//          'name' => $request->name,
//          'email' => $request->username,
//          'password' => $request->password
//       ]);

//       return redirect()->route('profile.edit');
// }

    $request->user()->update(
        $request->all()
);
return view('profile.edit', array('user' => Auth::user()) );
}
}