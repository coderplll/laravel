<?php

namespace App\Listeners;

use App\Events\RegisterMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class SendMessage
{
  /**
   * Create the event listener.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  /**
   * Handle the event.
   *
   * @param  RegisterMessage  $event
   * @return void
   */
  public function handle(RegisterMessage $event)
  {
    Cache(['name' => 'pll16'], 1000);
    Cache::add('name1', $event->user->name);
  }
}
