<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OAuthTest extends TestCase
{
    public function setUp():void
    {
      parent::setUp();
      $this->providerName = "google";
    }

    /**
     * test
     */
    public function test_Googleの認証画面を表示できる()
    {
      $this->get(route('socialOauth', ['provider' => $this->providerName]))
        ->assertStatus(200);
    }

    /**
     * test
     */
    public function test_Googleアカウントでユーザー登録できる()
    {
      $this->get(route('oauthCallback', ['provider' => $this->providerName]))
        ->assertStatus(200);
    }

}
