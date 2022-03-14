<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Credential;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function githubAuth(Request $request)
    {
        $clientId = config('services.github.id');
        $redirectUri = "http://localhost:1001/login";

        if($request->state === null) {
            $url = "https://github.com/login/oauth/authorize";
            $state = md5(time());
            $authUrl = "{$url}?client_id={$clientId}&redirect_uri={$redirectUri}&state={$state}";
            
            return redirect($authUrl);
        }

        $code = $request->code;
        $tokenUrl = "https://github.com/login/oauth/access_token";
        $clientSecret = config('services.github.secret');

        // ---------- get access token
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $tokenUrl);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"code={$code}&client_id={$clientId}&client_secret={$clientSecret}&redirect_uri={$redirectUri}");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        parse_str($response, $output);
        $accessToken = $output['access_token'];

        // ----------- use access token
        $userInfoUrl = "https://api.github.com/user";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $userInfoUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->getHeaders($accessToken));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $response = json_decode($response);
        curl_close($ch);
        
        // ----------- save info
        $user = User::firstOrCreate([
            "name" => $response->name,
            "login" => $response->login
        ]);

        Credential::firstOrCreate([
            "user_id" => $user->id,
            "service" => "github",
            "service_id" => $response->id,
            "service_login" => $response->login,
            "access_token" => $accessToken
        ]);

        Auth::login($user);

        return redirect()->route('index');
    }

    private function getHeaders($accessToken)
    {
        return [
            "User-agent: Github Oauth",
            "Accept: application/vnd.github.v3+json",
            "Authorization: token {$accessToken}"
        ];
    }
}