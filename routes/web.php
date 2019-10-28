<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $user = factory(\App\User::class)->create();


    // $phone = new \App\Phone();

    // $phone->phone = '123-123-1234';
    // $user->phone()->save($phone);

    // the code above can be re-written below as

    $user->phone()->create([
        'phone' => '222-333-4567',
    ]);

    $user = \App\User::first();

    // $roles = \App\Role::all();


    // $user->roles()->attach($roles);
    // above is how you attach and associate models to one another. You can detach models too using the detach keyword $user->roles()->detach($roles);

    // to specify the roles of users, use the code below

    // $user->roles()->syncWithoutDetaching([3]);
    // sync helps you share roles without repititon.

    // The code below starts from roles

    // $role = \App\Role::find(4);

    // $user->roles()->sync([
    //     1 => [
    //         'name' => 'victor'
    //     ]
    // ]);

    dd($user->roles->first());







    // $post = new \App\Post([
    //     'title' => 'Title Here',
    //     'body' => 'body Here',
    //     'user_id' => $user->id,
    // ]);

    // $post->save(); shortcut below

    $user->posts()->create([
        'title' => 'Title Here',
        'body' => 'body Here',
    ]);

    $user->posts->first()->title = 'New Title';
    $user->posts->first()->title = 'New Better Body';

    $user->push();
    // the above method is better cos push updates everything once rather than the below where you have to run the changes one at a time.

        // can be rewritten above
        // $post = $user->posts->first();

        // $post->title = 'New 123';
        // $post->body = 'body 123';
        // $post->save();

    return $user->posts;
});


// Creating default object from empty value----->>>this error can be resolved by specifying the post you want to output, i.e, $post = $user->post->first();

