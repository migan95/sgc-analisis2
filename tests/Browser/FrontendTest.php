<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FrontendTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLogin()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'admin@test.com')
                    ->type('password','admin')
                    ->press('submit')
                    ->assertPathIs('/dashboard');
        });
    }

}
