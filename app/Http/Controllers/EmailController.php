<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\EmailRequest;

use App\Jobs\SendMailJob; 

class EmailController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function sendMail(EmailRequest $request) {
    $name = $request->get('name');
    $email = $request->get('email');

    $job = new SendMailJob($name, $email);
    $this->dispatch($job);

    return response()->json([
      'status' => true,
      'code'   => 200
    ]);
  }

  public function sendAdminMail() {
    $name = env('ADMIN_NAME');
    $email = env('ADMIN_MAIL');

    $job = new SendMailJob($name, $email);
    $this->dispatch($job);

    return response()->json([
      'status' => true,
      'code'   => 200
    ]);
  }
}