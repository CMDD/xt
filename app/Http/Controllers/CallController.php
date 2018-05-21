<?php

namespace App\Http\Controllers;
use Twilio\Rest\Client;
use Twilio\TwiMl;
use App\Llamada;
use Carbon\Carbon;
use Redirect;


use Illuminate\Http\Request;

class CallController extends Controller
{
    protected $client;

    public function __construct()
    {
      Carbon::setLocale('es');
      $this->client = new Client("AC66964af062eabd908d5b3760d62a94f8","ce6617680be0416b500dd253d7edfc88");
    }

    public function call(Request $request)
    {
      $numero = '+'.$request->numero;
      try {
        $call = $this->client->calls->create(
          $numero,
          '+13014175639 ',

          array(
            'record'=>true,
            // 'StatusCallbackUrl'=>'http://89af4d73.ngrok.io/record',
            'StatusCallbackMethod'=>'POST',
            'recordingStatusCallback'=>'http://f70d8535.ngrok.io/record',
            'url' => 'https://demo.twilio.com/welcome/voice'
          )
       );
          // \Session::get('cargando','conectando');
          // \Session::put('cargando', 'value');


       return view('admin.callcenter.llamar')->with('call',$call);

      } catch (\Exception $e) {
        return $e;
      }
    }
    public function terminar($sid){
      $llamadas = $this->client->calls($sid)
               ->update(array('status' => "completed"));
      return view('admin.callcenter.llamar');
    }
    public function record(Request $request){
      $audio = new Llamada();
      $audio->AccountSid = $request->AccountSid;
      $audio->CallSid = $request->CallSid;
      $audio->RecordingSid = $request->RecordingSid;
      $audio->RecordingUrl = $request->RecordingUrl.'.mp3';
      $audio->RecordingStatus = $request->RecordingStatus;
      $audio->RecordingDuration = $request->RecordingDuration;
      $audio->save();

    }

    public function lista(){
      $llamadas=Llamada::orderBy('id','DESC')->get();
      return view('admin.callcenter.llamada')->with('llamadas',$llamadas);
    }

    public function listaServer()
    {
      $llamadas = $this->client->recordings->read();

      return view('admin.callcenter.llamadas-serve')->with('llamadas',$llamadas);
    }
}
