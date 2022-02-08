<?php
namespace App\Libraries;

use Exception;
use Illuminate\Support\Facades\Http;

class Helpers {

  protected $baseApi = '';

	public function __construct(){
    $this->baseApi = env('BASE_API_URL');
  }

	public function consumeApi(string $path) {
		$response = Http::get($this->baseApi.$path);
    return $this->processResponse($response);
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