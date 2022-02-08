<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Libraries\Helpers;

class NewsController extends Controller
{
  public function __construct() {}

  public function allPosts() {
    $helper = new Helpers();
    return $helper->consumeApi('/posts');
  }

  public function findPost($id) {
    $helper = new Helper();
    return $helper->consumeApi("/posts/{$id}");
  }

  public function postComments($id) {
    $helper = new Helper();
    return $helper->consumeApi("/posts/{$id}/comments");
  }

  private function success($data){
    return [
      'data'=> $data,
      'status' => 'success',
      'code' => 200
    ];
  }

  private function failed($code){
    return [
      'messaje'=> 'A ocurrido un error',
      'status' => 'error',
      'code' => $code
    ];
  }

  private function processResponse($response) {
    if($response->failed()) {
      return response()->json($this->failed(404));
    }
    
    return response()->json($this->success($response->json()));
  }
}