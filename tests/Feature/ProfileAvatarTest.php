<?php

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

test('filepond upload stores avatar in temporary storage and returns its path', function () {
    Storage::fake('public');

    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->post(route('profile.upload'), [
            'avatar' => UploadedFile::fake()->image('avatar.jpg'),
        ]);

    $response->assertOk();

    $temporaryPath = $response->getContent();

    expect($temporaryPath)->toStartWith('tmp/');
    Storage::disk('public')->assertExists($temporaryPath);
});

test('filepond revert removes the temporary avatar', function () {
    Storage::fake('public');

    $user = User::factory()->create();
    $temporaryPath = 'tmp/' . Str::random(10) . '.jpg';

    Storage::disk('public')->put($temporaryPath, 'avatar');

    $response = $this
        ->actingAs($user)
        ->call('DELETE', route('profile.upload.revert'), [], [], [], [], $temporaryPath);

    $response->assertOk();
    Storage::disk('public')->assertMissing($temporaryPath);
});

test('profile update moves a temporary avatar into the final directory', function () {
    Storage::fake('public');

    $user = User::factory()->create([
        'avatar' => 'img/old-avatar.jpg',
    ]);

    Storage::disk('public')->put('img/old-avatar.jpg', 'old-avatar');
    Storage::disk('public')->put('tmp/new-avatar.jpg', 'new-avatar');

    $response = $this
        ->actingAs($user)
        ->patch(route('profile.update'), [
            'name' => 'Updated Name',
            'username' => 'updatedusername',
            'email' => $user->email,
            'avatar' => 'tmp/new-avatar.jpg',
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('profile.edit', absolute: false));

    $user->refresh();

    expect($user->avatar)->toStartWith('img/');
    expect($user->avatar)->not->toBe('img/old-avatar.jpg');

    Storage::disk('public')->assertMissing('tmp/new-avatar.jpg');
    Storage::disk('public')->assertMissing('img/old-avatar.jpg');
    Storage::disk('public')->assertExists($user->avatar);
});

test('profile update without a new avatar keeps the existing avatar path', function () {
    Storage::fake('public');

    $user = User::factory()->create([
        'avatar' => 'img/existing-avatar.jpg',
    ]);

    Storage::disk('public')->put('img/existing-avatar.jpg', 'existing-avatar');

    $response = $this
        ->actingAs($user)
        ->patch(route('profile.update'), [
            'name' => 'Updated Name',
            'username' => 'existingavataruser',
            'email' => $user->email,
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('profile.edit', absolute: false));

    expect($user->refresh()->avatar)->toBe('img/existing-avatar.jpg');
    Storage::disk('public')->assertExists('img/existing-avatar.jpg');
});

test('profile page falls back to the default avatar when the stored file is missing', function () {
    Storage::fake('public');

    $user = User::factory()->create([
        'avatar' => 'img/missing-avatar.jpg',
    ]);

    $response = $this
        ->actingAs($user)
        ->get(route('profile.edit'));

    $response->assertOk();
    $response->assertSee(asset('img/sbcf-default-avatar.webp'), false);
});
