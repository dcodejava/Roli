<?php
    /**
     * Copyright (c) 2008, 2010, 2016, JavaDan and/or its affiliates. All rights reserved.
     *
     * Redistribution and use in source and binary forms, with or without
     * modification, are permitted provided that the following conditions
     * are met:
     *
     *   - Redistributions of source code must retain the above copyright
     *     notice, this list of conditions and the following disclaimer.
     *
     *   - Redistributions in binary form must reproduce the above copyright
     *     notice, this list of conditions and the following disclaimer in the
     *     documentation and/or other materials provided with the distribution.
     *
     *   - Neither the name of Oracle nor the names of its
     *     contributors may be used to endorse or promote products derived
     *     from this software without specific prior written permission.
     *
     * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS
     * IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO,
     * THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
     * PURPOSE ARE DISCLAIMED.  IN NO EVENT SHALL THE COPYRIGHT OWNER OR
     * CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
     * EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
     * PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR
     * PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF
     * LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
     * NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
     * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
     */
    /**
     * Created using PhpStorm.
     *
     * @package    Roli
     *
     * @author     Java <dcodejava@gmail.com>
     * @time-stamp 22/08/2016, 03:12 PM.
     */
    require_once 'vendor/autoload.php';

    use Roli\Security\Crypt\BaseCrypt as BaseCrypt;

    $rijndael = new \phpseclib\Crypt\Rijndael();

    $pass_phrase = '*Administrator @Dick@';
    $master_key = hash('sha256', $pass_phrase);

    $rijndael->setKey($master_key);

    $size = 10 * 2;
    $plaintext = '';
    for ($i = 0; $i < $size; $i++)
    {
        $plaintext .= 'a';
    }

    echo "<pre>plaintext\t\t= '$plaintext'\n";
    echo "rijndael\t\t= rijndael->decrypt->encrypt()" . $rijndael->decrypt($rijndael->encrypt($plaintext));
    echo "\nBaseCrypt::encrypt\t= " . BaseCrypt::encrypt($plaintext, $pass_phrase);
    echo "\nBaseCrypt::decrypt\t= " . BaseCrypt::decrypt($rijndael->encrypt($plaintext), $pass_phrase);
    echo "</pre>";
    echo "<h1>" . Roli\Security\Crypt\BaseCrypt::encrypt($plaintext, $pass_phrase) . "</h1>";
    echo "<h1>" . Roli\Security\Crypt\BaseCrypt::decrypt($rijndael->encrypt($plaintext), $pass_phrase) . "</h1>";
    $fb = new Facebook\Facebook([
                                    'app_id'                => '290233574680993',
                                    // Replace '290233574680993' with your app id
                                    'app_secret'            => '04375d7110ec57f9d2d9882b3b01a24c',
                                    'default_graph_version' => 'v2.2',
                                ]);

    $helper = $fb->getRedirectLoginHelper();

    try
    {
        $accessToken = $helper->getAccessToken();
    }
    catch (Facebook\Exceptions\FacebookResponseException $e)
    {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    }
    catch (Facebook\Exceptions\FacebookSDKException $e)
    {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

    if (!isset($accessToken))
    {
        if ($helper->getError())
        {
            header('HTTP/1.0 401 Unauthorized');
            echo "Error: " . $helper->getError() . "\n";
            echo "Error Code: " . $helper->getErrorCode() . "\n";
            echo "Error Reason: " . $helper->getErrorReason() . "\n";
            echo "Error Description: " . $helper->getErrorDescription() . "\n";
        }
        else
        {
            header('HTTP/1.0 400 Bad Request');
            echo 'Bad request';
        }
        exit;
    }

    // Logged in
    echo '<h3>Access Token</h3>';
    var_dump($accessToken->getValue());

    // The OAuth 2.0 client handler helps us manage access tokens
    $oAuth2Client = $fb->getOAuth2Client();

    // Get the access token metadata from /debug_token
    $tokenMetadata = $oAuth2Client->debugToken($accessToken);
    echo '<h3>Metadata</h3>';
    var_dump($tokenMetadata);

    // Validation (these will throw FacebookSDKException's when they fail)
    $tokenMetadata->validateAppId('290233574680993'); // Replace '290233574680993' with your app id
    // If you know the user ID this access token belongs to, you can validate it here
    //$tokenMetadata->validateUserId('123');
    $tokenMetadata->validateExpiration();

    if (!$accessToken->isLongLived())
    {
        // Exchanges a short-lived access token for a long-lived one
        try
        {
            $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
        }
        catch (Facebook\Exceptions\FacebookSDKException $e)
        {
            echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
            exit;
        }

        echo '<h3>Long-lived</h3>';
        var_dump($accessToken->getValue());
    }

    $_SESSION['fb_access_token'] = (string)$accessToken;

    // User is logged in with a long-lived access token.
    // You can redirect them to a members-only page.
    //header('Location: https://example.com/members.php');

    $fb = new Facebook\Facebook([
                                    'app_id'                => '290233574680993',
                                    // Replace '290233574680993' with your app id
                                    'app_secret'            => '04375d7110ec57f9d2d9882b3b01a24c',
                                    'default_graph_version' => 'v2.2',
                                ]);

    $helper = $fb->getRedirectLoginHelper();
    $callback = $_SERVER['SERVER_ADDR'] . $_SERVER['PHP_SELF'];
    $callback = 'http://localhost/roli/index.php';
    $permissions = ['email']; // Optional permissions
    $loginUrl = $helper->getLoginUrl($callback, $permissions);

    echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';

