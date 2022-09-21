<?php

namespace App\Services;

use App\Models\bendahara;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BendaharaService
{
    public function getBendahara()
    {
        // 
        $title = 'Bendahara';
        $data = bendahara::with('user')->get();

        $status = true;
        $message = 'Data Bendahara';
        $result = [
            'title' => $title,
            'data' => $data,
            'status' => $status,
            'message' => $message
        ];

        return $result;
    }

    public function store($data)
    {
        // dd($data);
        $validator = Validator::make($data, [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|same:repassword',
        ]);

        // dd($data);
        if ($validator->fails()) {
            $status = true;
            $message = 'Data Gagal Ditambahkan';
            $result = [
                'status' => $status,
                'message' => $message,
                'errors' => $validator->errors()->first()
            ];
            return $result;
        }

        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);

            $user->assignRole('Bendahara');

            $bendahara = bendahara::create([
                'user_id' => $user->id,
                'nip' => $data['nip'],
                'telpon_bendahara' => $data['telpon_bendahara'],
            ]);

            $status = true;
            $message = 'Data Berhasil Ditambahkan';
            $result = [
                'status' => $status,
                'message' => $message,
                'data' => $bendahara
            ];

            DB::commit();

            return $result;
        } catch (\Throwable $th) {
            //throw $th;

            // dd($th);
            DB::rollback();

            $status = false;
            $message = $th->getMessage();
            $result = [
                'status' => $status,
                'message' => $message,
            ];

            return $result;
        }
    }

    public function update($data)
    {
        $validator = Validator::make($data, [
            'email' => 'required|email|unique:users,email,' . $data['user_id'],
        ]);

        // dd($data);
        if ($validator->fails()) {

            dd($validator->errors()->first());
            $status = true;
            $message = 'Data Gagal Ditambahkan';
            $result = [
                'status' => $status,
                'message' => $message,
                'errors' => $validator->errors()->first()
            ];
            return $result;
        }

        $real_data = collect(request()->except('_token', 'user_id'))->filter()->all();

        if (array_key_exists('password', $real_data)) {
            # code...
            $user = [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ];

            // dd($user);
        } else {
            $user = [
                'name' => $data['name'],
                'email' => $data['email'],
            ];
        }

        $bendahara = [
            'nip' => $data['nip'],
            'telpon_bendahara' => $data['telpon_bendahara'],
        ];

        // dd($real_data);
        DB::beginTransaction();

        try {
            //code...
            User::where('id', $data['user_id'])->update($user);

            bendahara::where('user_id', $data['user_id'])->update($bendahara);

            DB::commit();

            $status = true;
            $message = 'Data Berhasil Diubah';
            $result = [
                'status' => $status,
                'message' => $message,
                'data' => $data
            ];

            return $result;
        } catch (\Throwable $th) {
            //throw $th;
            // dd($th);

            DB::rollback();
            $status = false;
            $message = $th->getMessage();
            $result = [
                'status' => $status,
                'message' => $message,
            ];

            return $result;
        }
        // dd($real_data);
    }
}
