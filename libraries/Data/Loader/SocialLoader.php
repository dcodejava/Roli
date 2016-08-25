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
     * @project    Roli
     *
     * @author     Java <dcodejava@gmail.com>
     * @time-stamp Thursday, 25 August 2016, 02:35 PM.
     */
    namespace Roli\Data\Loader;
    // * List Uses class
    use Roli\Data\Loader\Interfaces\LoaderInterface;
    /**
     * Class SocialLoader an implementation of Roli\Data\Loader\Interfaces\LoaderInterface
     *
     * @package   dcodejava/Roli
     */
    class SocialLoader implements LoaderInterface
    {
        /**
         * @var $connection_id string The connection id.
         */
        private $connection_id = '';
        /**
         * @var $user_id string The user id.
         */
        private $user_id = '';
        /**
         * Method constructor of SocialLoader.
         *
         * @param string $connection_id The connection id
         * @param string $user_id       The user id
         */
        public function __construct($connection_id = '', $user_id = '')
        {
            $this->connection_id = $connection_id;
            $this->user_id = $user_id;
        }
        /**
         * Method loadXML
         *
         * @param string $path The path to load.
         *
         * @author    : Mr. Java <dcodejava@gmail.com>
         * @time-stamp: Thursday, 25 August 2016, 09:26 AM.
         *
         * @return array $data;
         */
        public function loadXML($path = '')
        {
            if (is_readable($path) && file_exists($path))
            {
                print_r(simplexml_load_file($path, "SimpleXMLElement", LIBXML_NOCDATA));
            }
        }
    }