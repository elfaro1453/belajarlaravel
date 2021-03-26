<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\PasswordValidationRules;

class UserController extends Controller
{
    use PasswordValidationRules;
    /**
     * Membuat fungsi register user untuk API
     */
    public function apiRegister(Request $request)
    {
        // validasi semua input agar sesuai dengan yang dibutuhkan oleh database
        // cek https://laravel.com/docs/8.x/validation
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'email|max:255|unique:App\Models\User,email|required',
                'name' => 'string|max:255|required',
                'password' => $this->passwordRules(),
            ]
        );
        // jika validasi error, maka tampilkan error ke dalam response json
        if ($validator->fails()) {
            // dapatkan semua error
            $errors = $validator->errors()->all();

            // return json with all error
            return response()->json(compact('errors'), 400);
        }

        // jika validasi sukses, buat user baru
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->house_number = $request->house_number;
        $user->phone_number = $request->phone_number;
        $user->city = $request->city;

        $user->save();

        // create token for newly user
        $token = $user->createToken('api_token')->plainTextToken;

        // buat returnData berisi semua data yang akan ditampilkan
        $returnData = \compact('user', 'token');
        return response()->json($returnData, 200);
    }

    /**
     * Membuat fungsi user login untuk API
     * @see https://laravel.com/docs/8.x/requests#retrieving-all-input-data
    */
    public function apiLogin(Request $request)
    {
        $input = $request->all();
        $data = \compact('input');
        return response()->json($data, 200);
    }
}
