<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class HelloMessage extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'Hello:info {name : 用户名} {--age: 年龄}';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = '用法 php artisan Hello:info 名字 --sex=性别';

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
    $name = $this->ask("What is your name?");
    $age = $this->choice("What is your name?", ['10', '20', '30', '40'], 0); //默认是0下标,就是第一个值.
    $password = $this->secret('Please input a password');
    if ($password != '123') {
      $this->info($password);
      $this->error('Password error');
      exit(-1);
    }
    if ($this->confirm('Are your sure?')) {
      $this->info('Hello' . $name . 'Your password is ' . $password);
    } else {
      exit(0);
    }
  }
}
