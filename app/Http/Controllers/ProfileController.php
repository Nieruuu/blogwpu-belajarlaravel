<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $user = $request->user();
        $emailChanged = $validated['email'] !== $user->email;
        $avatarPath = $validated['avatar'] ?? null;

        unset($validated['avatar']);

        $user->fill($validated);

        if ($emailChanged) {
            $user->email_verified_at = null;
        }

        if ($avatarPath !== null) {
            $disk = Storage::disk('public');

            if (preg_match('/^tmp\/[A-Za-z0-9._-]+$/', $avatarPath) !== 1 || ! $disk->exists($avatarPath)) {
                throw ValidationException::withMessages([
                    'avatar' => 'Uploaded avatar could not be processed. Please upload the image again.',
                ]);
            }

            if (! empty($user->avatar) && $disk->exists($user->avatar)) {
                $disk->delete($user->avatar);
            }

            $extension = pathinfo($avatarPath, PATHINFO_EXTENSION);
            $newFileName = (string) Str::uuid();
            $finalPath = 'img/' . $newFileName . ($extension ? '.' . $extension : '');

            $disk->move($avatarPath, $finalPath);
            $user->avatar = $finalPath;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function upload(Request $request): Response
    {
        $validator = Validator::make($request->all(), [
            'avatar' => ['required', 'image', 'max:2048'],
        ]);

        if ($validator->fails()) {
            return response($validator->errors()->first('avatar'), 422, [
                'Content-Type' => 'text/plain',
            ]);
        }

        $path = $request->file('avatar')->store('tmp', 'public');

        return response($path, 200, [
            'Content-Type' => 'text/plain',
        ]);
    }

    public function revert(Request $request): Response
    {
        $avatarPath = trim($request->getContent());

        if ($avatarPath === '') {
            return response('', 200);
        }

        if (preg_match('/^tmp\/[A-Za-z0-9._-]+$/', $avatarPath) !== 1) {
            return response('Invalid temporary avatar path.', 422, [
                'Content-Type' => 'text/plain',
            ]);
        }

        $disk = Storage::disk('public');

        if ($disk->exists($avatarPath)) {
            $disk->delete($avatarPath);
        }

        return response('', 200);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
