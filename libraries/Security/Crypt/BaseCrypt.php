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
     * @time-stamp 23/08/2016, 04:58 PM.
     */
    namespace Roli\Security\Crypt;
    // List using classes;
    use phpseclib\Crypt\Rijndael as Rijndael;
    /**
     * Base Class for all encryption
     *
     * @package    Roli
     *
     * @author     Mr. Java <java@panafricancapitalplc.com>
     * @time-stamp Tuesday, 23 August 2016, 06:13 PM.
     */
    class BaseCrypt
    {
        /**
         * Decrypts a message.
         *
         * @see        \phpseclib\Crypt\Base::encrypt();
         * @access     public
         *
         * @param String $message The message to be decrypts
         * @param String $salt    The message slat to use for decrypting
         *
         * @time-stamp Tuesday, 23 August 2016, 06:13 PM.
         *
         * @return String $plaintext
         */
        public static function decrypt($message, $salt)
        {
            $crypt = new Rijndael();

            $master_key = hash('sha256', $salt);

            $crypt->setKey($master_key);

            $plaintext = $crypt->decrypt($message);

            return $plaintext;
        }
        /**
         * Encrypts a message.
         *
         * @see        \phpseclib\Crypt\Base::decrypt();
         * @access     public
         *
         * @param String $plaintext The message to be decrypts
         * @param String $salt      The message slat to use for decrypting
         *
         * @time-stamp Wednesday, 24 August 2016, 09:37 AM.
         *
         * @return String $cipher_text
         */
        public static function encrypt($plaintext, $salt)
        {
            $crypt = new Rijndael();

            $master_key = hash('sha256', $salt);

            $crypt->setKey($master_key);

            $cipher_text = $crypt->encrypt($plaintext);

            return $cipher_text;
        }
    }