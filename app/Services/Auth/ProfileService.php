<?php
namespace App\Services\Auth;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ChangeProfileRequest;
use App\Http\Traits\Hashable;
use App\Http\Traits\Imagable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use TCG\Voyager\Models\Role;

class ProfileService extends TokenIssueService {

    use Hashable, Imagable;

    public function get(Request $request) {
        return User::find(auth('api')->user()->id);
    }

    public function changePassword(ChangePasswordRequest $changePasswordRequest) {
        $data = $changePasswordRequest->validated();
        $user = $this->get($changePasswordRequest);
        $user->update([
            'password' => $this->hashPassword($data['new_password'])
        ]);
        return response()->json(['message' => 'Пароль успешно изменен!']);
    }

    public function put(ChangeProfileRequest $changeProfileRequest) {
        $data = $changeProfileRequest->validated();
        $user = $this->get($changeProfileRequest);
//        $file = $this->fromBase64($data['img']);
//        Storage::disk(config('voyager.storage.disk'))->delete('',$user->img);
//        Storage::disk(config('voyager.storage.disk'))->put('',$file);
        $user->update([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            //'img' => $file->hashName()
        ]);
        return response()->json(['message' => 'Профиль успешно изменен!']);
    }

    public function delete(Request $request) {
        $user = $this->get($request);
        $user->delete();
        $this->logout($request);
        return response()->json(['message' => 'Ваш аккаунт удален!']);
    }

    public function logout(Request $request) {
        auth('api')->logout();
        return response()->json(['message' => 'Вы успешно вышли из аккаунта!']);
    }

}
