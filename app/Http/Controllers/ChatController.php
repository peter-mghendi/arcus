<?php

namespace App\Http\Controllers;

use App\Classes\AgoraDynamicKey\RtcTokenBuilder;
use App\Events\MakeAgoraCall;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ChatController extends Controller
{
    /**
     * Get a token.
     *
     * @return \Illuminate\Http\Response
     */
    public function chat()
    {
        $users = User::where('id', '<>', Auth::id())->get();
        return Inertia::render('Chat', [
            'allusers' => $users,
            'authuserid'=> auth()->id(),
            'authuser'=> auth()->user()->name,
            'agora_id' => config('services.agora.app_id')
        ]);
    }

    /**
     * Get a token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function token(Request $request)
    {
        return RtcTokenBuilder::buildTokenWithUserAccount(
            appID: config('services.agora.app_id'),
            appCertificate: config('services.agora.app_certificate'),
            channelName: $request->channelName,
            userAccount: Auth::user()->name,
            role: RtcTokenBuilder::RoleAttendee,
            privilegeExpireTs: now()->addSeconds(config('services.agora.token_expire_time'))->getTimestamp()
        );
    }

    /**
     * Call another user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function call(Request $request)
    {
        $data = [
            'userToCall' => $request->user_to_call,
            'channelName' => $request->channel_name,
            'from' => Auth::id()
        ];

        broadcast(new MakeAgoraCall($data))->toOthers();
    }
}
