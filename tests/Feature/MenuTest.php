<?php

namespace Tests\Feature;

use App\Menu;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MenuTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testMenuCreateWithoutAuth()
    {
        $this->get("/menus/create")
            ->assertStatus(403);
    }

    public function testMenuCreate()
    {
        $user = new User(array('name' => "Elise"));
        $this->be($user);

        $this->get("/menus/create")
            ->assertSee("Créer un Menu")
            ->assertStatus(200);
    }

    public function testMenuDeleteWithoutAuth()
    {
        $this->get("/menus/delete/1")
            ->assertStatus(405);
    }

    public function testMenuDelete()
    {
        $user = new User(array('name' => "Elise"));
        $this->be($user);

        $user->id = 60;

        $menu = factory(Menu::class)->create([
            'user_id' => $user->id
        ]);

        $this->get("/menus/delete/$menu->id")
            ->assertStatus(200);
    }

    public function testMenuIndexWithoutAuth()
    {
        $this->get("menus/index")
            ->assertStatus(200); // error 404 handled
    }

    public function testMenuIndex()
    {
        $user = new User(array('name' => "Elise"));
        $this->be($user);

        $this->get("/menus/index")
            ->assertStatus(200); // error handled
    }

    public function testMenuShowWithoutAuth()
    {
        $this->get("menus/3")
            ->assertStatus(200); // error handled
    }

    public function testMenuShow()
    {
        $user = new User(array('name' => "Elise"));
        $this->be($user);

        $this->get("/menus/u")
            ->assertStatus(200); // error 404 handled
    }

    public function testMenuShowExist()
    {
        $user = new User(array('name' => "elise"));
        $this->be($user);

        $menu = factory(Menu::class)->create();

        $this->get("/menus/$menu->id")
            ->assertStatus(200);
    }
}