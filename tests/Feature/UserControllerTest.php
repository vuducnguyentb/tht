<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /**
     * Test checklogin
     *
     * @return void
     */
    public function testCheckLogin()
    {
        $response = $this->get('/checklogin');

        $response->assertStatus(200);
    }
    /**
     * Test checklogin
     *
     * @return void
     */
    public function testAjaxCheckLogin()
    {
        $response = $this->get('/ajax/users/checklogin');
        /*
        $response->dumpHeaders();
        $response->dump();
        */
        $response->assertStatus(200);
    }
    /**
     * Test login
     *
     * @return void
     */
    public function testLogin()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertViewIs('themes.tht.errors.404');
    }
    /**
     * Test ajax login
     *
     * @return void
     */
    public function testAjaxLogin()
    {
        $response = $this->json('POST', '/ajax/login', ['email' => 'long.nguyen@motbit.com', 'password' => '123456$q']);
        /*
        $response->dumpHeaders();
        $response->dump();
        */
        $response->assertRedirect('/home');
        //$response = $this->get('/ajax/login');

        //$response->assertStatus(200);
        //$response->assertStatus(405);
        //$response->assertViewIs('admin.index');
        //$response->assertRedirect('/home');
    }
    /**
     * Test ajax login
     *
     * @return void
     */
    public function testAjaxLogout()
    {
        $response = $this->json('POST', '/ajax/logout');

        $response->dumpHeaders();
        $response->dump();
        $response->assertRedirect('/');
        //$response = $this->get('/ajax/login');

        //$response->assertStatus(200);
        //$response->assertStatus(405);
        //$response->assertViewIs('admin.index');
        //$response->assertRedirect('/home');
    }
}
