<?php

namespace Tests\Feature\Mail;

use Tests\TestCase;
use App\Jobs\SendEmailToAdmin;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;

class MailTest extends TestCase
{
    use RefreshDatabase;
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

    public function test_send_mail_order()
    {
        Queue::fake();

        SendEmailToAdmin::dispatch('yenrion9941@gmail.com', [], 200);

        Queue::assertPushed(SendEmailToAdmin::class);

    }
}
