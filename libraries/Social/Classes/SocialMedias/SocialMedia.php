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
     * @project   :    Roli
     *
     * @author    :     Mr. Java <dcodejava@gmail.com>
     * @time-stamp: 24-Aug-16, 11:58 PM.
     */
    namespace Roli\Social\Classes\SocialMedias;
    // * List using namespace
    use Roli\Social\Interfaces\SocialInterface;
    /**
     * Class SocialMedia
     *
     * @package   Roli\Classes\SocialMedias
     *
     * @author    : Mr. Java <dcodejava@gmail.com>
     * @time-stamp: 24-Aug-16, 11:58 PM.
     */
    abstract class SocialMedia implements SocialInterface
    {
        /**
         * Method loadCredentials
         *
         * @package   Roli\Classes\SocialMedias
         *
         * @param string[] $credentials The paths of the credentials to load.
         *
         * @author    : Mr. Java <dcodejava@gmail.com>
         * @time-stamp: Thursday, 25 August 2016, 09:26 AM.
         *
         * @return bool[];
         */
        protected abstract function loadCredentials($credentials = []);
        /**
         * Method loadCredential
         *
         * @package   Roli\Classes\SocialMedias
         *
         * @param string $credential The path of the credentials to load.
         *
         * @author    : Mr. Java <dcodejava@gmail.com>
         * @time-stamp: Thursday, 25 August 2016, 09:26 AM.
         *
         * @return bool[];
         */
        protected abstract function loadCredential($credential = '');
    }