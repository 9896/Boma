<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User as User;
use App\Models\ChatMessage as ChatMessage;
use App\Events\ChatMessageWasReceived as ChatMessageWasReceived;

class SendChatMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chat:message {message}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send chat message';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //fire off an event randomly grabbing the first user for now
        $user =  User::first();
        $message = ChatMessage::create([
            'user_id' => $user->id,
            'message' => $this->argument('message')
        ]);
        event(new ChatMessageWasReceived($message, $user));
    }
}
