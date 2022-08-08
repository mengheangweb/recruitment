<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Post;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testShowLoginForm()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertUrlIs(url('/login'))
                    ->assertSee('or sign up here');
        });
    }

    public function testLogin()
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'password')
                    ->press('Submit')
                    ->assertUrlIs(url('/home'))
                    ->assertSee(__('home.welcome_msg'));
        });
    }

    public function testMyPost()
    {
        $user = User::latest()->first();
        $post = Post::factory()->create([
            'user_id' => $user->id
        ]);

        $this->browse(function (Browser $browser) use ($user, $post) {
            $browser->loginAs($user)
                    ->visit('/my-listing')
                    ->pause('6000')
                    ->assertSee($post->title);
        });
    }
}
