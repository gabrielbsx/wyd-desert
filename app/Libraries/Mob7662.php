<?php

namespace App\Libraries;

class Mob7662
{
    public $account;

    public function __construct($data)
    {
        $account = $data;
        for ($i = 0, $j = 0; $i < (strlen($account) / 2); $i += 2, $j++) {
            $this->account[$j] = $account[$i] . $account[($i + 1)];
        }
    }

    public function getUsername()
    {
        $user = "";
        for ($i = 0; $i <= 12 and $this->account[$i] != "00"; ++$i)
            $user .= hex2bin($this->account[$i]);
        return $user;
    }

    public function getPassword()
    {
        $pass = "";
        for ($i = 16; $i <= 26 and $this->account[$i] != "00"; $i++)
            $pass .= hex2bin($this->account[$i]);
        return $pass;
    }

    public function getNumeric()
    {
        $pass = "";
        for ($i = 202; $i <= 208 and $this->account[$i] != "00"; $i++)
            $pass .= hex2bin($this->account[$i]);
        return (is_numeric($pass)
            ? $pass : "Não definido");
    }

    public function getCharacters()
    {
        $char       = array();
        for ($i = 1; $i <= 4; ++$i) {
            $char[$i]           = array();
            $char[$i]["nick"]   = "";

            for ($j = 216 + (816 * ($i - 1)); $this->account[$j] != "00"; ++$j)
                $char[$i]["nick"] .= hex2bin($this->account[$j]);

            if ($char[$i]["nick"] == "")
                continue;

            $char[$i]["clan"]          = hexdec($this->account[(232 + (816 * ($i - 1)))]);
            $char[$i]["merchant"]      = hexdec($this->account[(272 + (816 * ($i - 1)))]);
            $char[$i]["attackrun"]     = hexdec($this->account[(273 + (816 * ($i - 1)))]);
            $char[$i]["direction"]     = hexdec($this->account[(274 + (816 * ($i - 1)))]);
            $char[$i]["chaosrate"]     = hexdec($this->account[(275 + (816 * ($i - 1)))]);
            $char[$i]["guild"]         = hexdec($this->account[(235 + (816 * ($i - 1)))] . $this->account[(234 + (816 * ($i - 1)))]);
            $char[$i]["guildlider"]    = hexdec($this->account[(1012 + (816 * ($i - 1)))]);
            $char[$i]["classe"]        = hexdec($this->account[(356 + (816 * ($i - 1)))]);
            #$char[$i]["coins"]         = hexdec($this->account[(4504 + $i)]);
            $char[$i]["level"]         = hexdec($this->account[(263 + (816 * ($i - 1)))] . $this->account[(262 + (816 * ($i - 1)))] . $this->account[(261 + (816 * ($i - 1)))] . $this->account[(260 + (816 * ($i - 1)))]);
            $char[$i]["defesa"]        = hexdec($this->account[(313 + (816 * ($i - 1)))] . $this->account[(312 + (816 * ($i - 1)))]); //hexdec($this->account[(267 + (816 * ($i - 1)))].$this->account[(266 + (816 * ($i - 1)))].$this->account[(265 + (816 * ($i - 1)))].$this->account[(264 + (816 * ($i - 1)))]);
            $char[$i]["for"]           = hexdec($this->account[(293 + (816 * ($i - 1)))] . $this->account[(292 + (816 * ($i - 1)))]);
            $char[$i]["int"]           = hexdec($this->account[(295 + (816 * ($i - 1)))] . $this->account[(294 + (816 * ($i - 1)))]);
            $char[$i]["des"]           = hexdec($this->account[(297 + (816 * ($i - 1)))] . $this->account[(296 + (816 * ($i - 1)))]);
            $char[$i]["cons"]          = hexdec($this->account[(299 + (816 * ($i - 1)))] . $this->account[(298 + (816 * ($i - 1)))]);
            $char[$i]["hp"]["max"]     = hexdec($this->account[(277 + (816 * ($i - 1)))] . $this->account[(276 + (816 * ($i - 1)))]);
            $char[$i]["mp"]["max"]     = hexdec($this->account[(281 + (816 * ($i - 1)))] . $this->account[(280 + (816 * ($i - 1)))]);
            $char[$i]["hp"]["atual"]   = hexdec($this->account[(285 + (816 * ($i - 1)))] . $this->account[(284 + (816 * ($i - 1)))]);
            $char[$i]["mp"]["atual"]   = hexdec($this->account[(289 + (816 * ($i - 1)))] . $this->account[(288 + (816 * ($i - 1)))]);
            $char[$i]["attack"][0]     = hexdec($this->account[(269 + (816 * ($i - 1)))] . $this->account[(268 + (816 * ($i - 1)))]);
            $char[$i]["attack"][1]     = hexdec($this->account[(317 + (816 * ($i - 1)))] . $this->account[(316 + (816 * ($i - 1)))]);
            $char[$i]["attack"][2]     = hexdec($this->account[(265 + (816 * ($i - 1)))] . $this->account[(264 + (816 * ($i - 1)))]);
            $char[$i]["attack"][3]     = hexdec($this->account[(313 + (816 * ($i - 1)))] . $this->account[(312 + (816 * ($i - 1)))]);
            $char[$i]["x"]             = hexdec($this->account[(257 + (816 * ($i - 1)))] . $this->account[(256 + (816 * ($i - 1)))]);
            $char[$i]["y"]             = hexdec($this->account[(259 + (816 * ($i - 1)))] . $this->account[(258 + (816 * ($i - 1)))]);
            $char[$i]["gold"]          = hexdec($this->account[(247 + (816 * ($i - 1)))] . $this->account[(246 + (816 * ($i - 1)))] . $this->account[(245 + (816 * ($i - 1)))] . $this->account[(244 + (816 * ($i - 1)))]);
            $char[$i]["exp"]           = hexdec($this->account[(251 + (816 * ($i - 1)))] . $this->account[(250 + (816 * ($i - 1)))] . $this->account[(249 + (816 * ($i - 1)))] . $this->account[(248 + (816 * ($i - 1)))]);
            $char[$i]["helmet"]        = array(
                "index"     => hexdec($this->account[(365 + (816 * ($i - 1)))] . $this->account[(364 + (816 * ($i - 1)))]),
                "ef1"       => hexdec($this->account[(366 + (816 * ($i - 1)))]),
                "efv1"      => hexdec($this->account[(367 + (816 * ($i - 1)))]),
                "ef2"       => hexdec($this->account[(368 + (816 * ($i - 1)))]),
                "efv2"      => hexdec($this->account[(369 + (816 * ($i - 1)))]),
                "ef3"       => hexdec($this->account[(370 + (816 * ($i - 1)))]),
                "efv3"      => hexdec($this->account[(371 + (816 * ($i - 1)))])
            );
            $char[$i]["peito"]         = array(
                "index"     => hexdec($this->account[(373 + (816 * ($i - 1)))] . $this->account[(372 + (816 * ($i - 1)))]),
                "ef1"       => hexdec($this->account[(374 + (816 * ($i - 1)))]),
                "efv1"      => hexdec($this->account[(375 + (816 * ($i - 1)))]),
                "ef2"       => hexdec($this->account[(376 + (816 * ($i - 1)))]),
                "efv2"      => hexdec($this->account[(377 + (816 * ($i - 1)))]),
                "ef3"       => hexdec($this->account[(378 + (816 * ($i - 1)))]),
                "efv3"      => hexdec($this->account[(379 + (816 * ($i - 1)))])
            );
            $char[$i]["calca"]         = array(
                "index"     => hexdec($this->account[(381 + (816 * ($i - 1)))] . $this->account[(380 + (816 * ($i - 1)))]),
                "ef1"       => hexdec($this->account[(382 + (816 * ($i - 1)))]),
                "efv1"      => hexdec($this->account[(383 + (816 * ($i - 1)))]),
                "ef2"       => hexdec($this->account[(384 + (816 * ($i - 1)))]),
                "efv2"      => hexdec($this->account[(385 + (816 * ($i - 1)))]),
                "ef3"       => hexdec($this->account[(386 + (816 * ($i - 1)))]),
                "efv3"      => hexdec($this->account[(387 + (816 * ($i - 1)))])
            );
            $char[$i]["luva"]          = array(
                "index"     => hexdec($this->account[(389 + (816 * ($i - 1)))] . $this->account[(388 + (816 * ($i - 1)))]),
                "ef1"       => hexdec($this->account[(390 + (816 * ($i - 1)))]),
                "efv1"      => hexdec($this->account[(391 + (816 * ($i - 1)))]),
                "ef2"       => hexdec($this->account[(392 + (816 * ($i - 1)))]),
                "efv2"      => hexdec($this->account[(393 + (816 * ($i - 1)))]),
                "ef3"       => hexdec($this->account[(394 + (816 * ($i - 1)))]),
                "efv3"      => hexdec($this->account[(395 + (816 * ($i - 1)))])
            );
            $char[$i]["bota"]          = array(
                "index"     => hexdec($this->account[(397 + (816 * ($i - 1)))] . $this->account[(396 + (816 * ($i - 1)))]),
                "ef1"       => hexdec($this->account[(398 + (816 * ($i - 1)))]),
                "efv1"      => hexdec($this->account[(399 + (816 * ($i - 1)))]),
                "ef2"       => hexdec($this->account[(400 + (816 * ($i - 1)))]),
                "efv2"      => hexdec($this->account[(401 + (816 * ($i - 1)))]),
                "ef3"       => hexdec($this->account[(402 + (816 * ($i - 1)))]),
                "efv3"      => hexdec($this->account[(403 + (816 * ($i - 1)))])
            );
            $char[$i]["arma"]          = array(
                "index"     => hexdec($this->account[(405 + (816 * ($i - 1)))] . $this->account[(404 + (816 * ($i - 1)))]),
                "ef1"       => hexdec($this->account[(406 + (816 * ($i - 1)))]),
                "efv1"      => hexdec($this->account[(407 + (816 * ($i - 1)))]),
                "ef2"       => hexdec($this->account[(408 + (816 * ($i - 1)))]),
                "efv2"      => hexdec($this->account[(409 + (816 * ($i - 1)))]),
                "ef3"       => hexdec($this->account[(410 + (816 * ($i - 1)))]),
                "efv3"      => hexdec($this->account[(411 + (816 * ($i - 1)))])
            );
            $char[$i]["shield"]        = array(
                "index"     => hexdec($this->account[(413 + (816 * ($i - 1)))] . $this->account[(412 + (816 * ($i - 1)))]),
                "ef1"       => hexdec($this->account[(414 + (816 * ($i - 1)))]),
                "efv1"      => hexdec($this->account[(415 + (816 * ($i - 1)))]),
                "ef2"       => hexdec($this->account[(416 + (816 * ($i - 1)))]),
                "efv2"      => hexdec($this->account[(417 + (816 * ($i - 1)))]),
                "ef3"       => hexdec($this->account[(418 + (816 * ($i - 1)))]),
                "efv3"      => hexdec($this->account[(419 + (816 * ($i - 1)))])
            );
            $char[$i]["fada"]          = array(
                "index"     => hexdec($this->account[(461 + (816 * ($i - 1)))] . $this->account[(460 + (816 * ($i - 1)))]),
                "ef1"       => hexdec($this->account[(462 + (816 * ($i - 1)))]),
                "efv1"      => hexdec($this->account[(463 + (816 * ($i - 1)))]),
                "ef2"       => hexdec($this->account[(464 + (816 * ($i - 1)))]),
                "efv2"      => hexdec($this->account[(465 + (816 * ($i - 1)))]),
                "ef3"       => hexdec($this->account[(466 + (816 * ($i - 1)))]),
                "efv3"      => hexdec($this->account[(467 + (816 * ($i - 1)))])
            );
            $char[$i]["montaria"]      = array(
                "index"     => hexdec($this->account[(469 + (816 * ($i - 1)))] . $this->account[(468 + (816 * ($i - 1)))]),
                "ef1"       => hexdec($this->account[(470 + (816 * ($i - 1)))]),
                "efv1"      => hexdec($this->account[(471 + (816 * ($i - 1)))]),
                "ef2"       => hexdec($this->account[(472 + (816 * ($i - 1)))]),
                "efv2"      => hexdec($this->account[(473 + (816 * ($i - 1)))]),
                "ef3"       => hexdec($this->account[(474 + (816 * ($i - 1)))]),
                "efv3"      => hexdec($this->account[(475 + (816 * ($i - 1)))])
            );
            $char[$i]["capa"]          = array(
                "index"     => hexdec($this->account[(477 + (816 * ($i - 1)))] . $this->account[(476 + (816 * ($i - 1)))]),
                "ef1"       => hexdec($this->account[(478 + (816 * ($i - 1)))]),
                "efv1"      => hexdec($this->account[(479 + (816 * ($i - 1)))]),
                "ef2"       => hexdec($this->account[(480 + (816 * ($i - 1)))]),
                "efv2"      => hexdec($this->account[(481 + (816 * ($i - 1)))]),
                "ef3"       => hexdec($this->account[(482 + (816 * ($i - 1)))]),
                "efv3"      => hexdec($this->account[(483 + (816 * ($i - 1)))])
            );
            $char[$i]["traje"]         = array(
                "index"     => hexdec($this->account[(453 + (816 * ($i - 1)))] . $this->account[(452 + (816 * ($i - 1)))]),
                "ef1"       => hexdec($this->account[(454 + (816 * ($i - 1)))]),
                "efv1"      => hexdec($this->account[(455 + (816 * ($i - 1)))]),
                "ef2"       => hexdec($this->account[(456 + (816 * ($i - 1)))]),
                "efv2"      => hexdec($this->account[(457 + (816 * ($i - 1)))]),
                "ef3"       => hexdec($this->account[(458 + (816 * ($i - 1)))]),
                "efv3"      => hexdec($this->account[(459 + (816 * ($i - 1)))])
            );
            $char[$i]["pingente"][0]   = array(
                "index"     => hexdec($this->account[(421 + (816 * ($i - 1)))] . $this->account[(420 + (816 * ($i - 1)))]),
                "ef1"       => hexdec($this->account[(422 + (816 * ($i - 1)))]),
                "efv1"      => hexdec($this->account[(423 + (816 * ($i - 1)))]),
                "ef2"       => hexdec($this->account[(424 + (816 * ($i - 1)))]),
                "efv2"      => hexdec($this->account[(425 + (816 * ($i - 1)))]),
                "ef3"       => hexdec($this->account[(426 + (816 * ($i - 1)))]),
                "efv3"      => hexdec($this->account[(427 + (816 * ($i - 1)))])
            );
            $char[$i]["pingente"][1]   = array(
                "index"     => hexdec($this->account[(437 + (816 * ($i - 1)))] . $this->account[(436 + (816 * ($i - 1)))]),
                "ef1"       => hexdec($this->account[(438 + (816 * ($i - 1)))]),
                "efv1"      => hexdec($this->account[(439 + (816 * ($i - 1)))]),
                "ef2"       => hexdec($this->account[(440 + (816 * ($i - 1)))]),
                "efv2"      => hexdec($this->account[(441 + (816 * ($i - 1)))]),
                "ef3"       => hexdec($this->account[(442 + (816 * ($i - 1)))]),
                "efv3"      => hexdec($this->account[(443 + (816 * ($i - 1)))])
            );
            $char[$i]["pingente"][2]   = array(
                "index"     => hexdec($this->account[(429 + (816 * ($i - 1)))] . $this->account[(428 + (816 * ($i - 1)))]),
                "ef1"       => hexdec($this->account[(430 + (816 * ($i - 1)))]),
                "efv1"      => hexdec($this->account[(431 + (816 * ($i - 1)))]),
                "ef2"       => hexdec($this->account[(432 + (816 * ($i - 1)))]),
                "efv2"      => hexdec($this->account[(433 + (816 * ($i - 1)))]),
                "ef3"       => hexdec($this->account[(434 + (816 * ($i - 1)))]),
                "efv3"      => hexdec($this->account[(435 + (816 * ($i - 1)))])
            );
            $char[$i]["pingente"][3]   = array(
                "index"     => hexdec($this->account[(445 + (816 * ($i - 1)))] . $this->account[(444 + (816 * ($i - 1)))]),
                "ef1"       => hexdec($this->account[(446 + (816 * ($i - 1)))]),
                "efv1"      => hexdec($this->account[(447 + (816 * ($i - 1)))]),
                "ef2"       => hexdec($this->account[(448 + (816 * ($i - 1)))]),
                "efv2"      => hexdec($this->account[(449 + (816 * ($i - 1)))]),
                "ef3"       => hexdec($this->account[(450 + (816 * ($i - 1)))]),
                "efv3"      => hexdec($this->account[(451 + (816 * ($i - 1)))])
            );
            $char[$i]["imunidade"]     = array(
                "sagrado"       => hexdec($this->account[(1028 + (816 * ($i - 1)))]),
                "trovao"        => hexdec($this->account[(1029 + (816 * ($i - 1)))]),
                "fogo"          => hexdec($this->account[(1030 + (816 * ($i - 1)))]),
                "gelo"          => hexdec($this->account[(1031 + (816 * ($i - 1)))])
            );
            $char[$i]["especiais"]     = array(
                0           => hexdec($this->account[(301 + (816 * ($i - 1)))] . $this->account[(300 + (816 * ($i - 1)))]),
                1           => hexdec($this->account[(303 + (816 * ($i - 1)))] . $this->account[(302 + (816 * ($i - 1)))]),
                2           => hexdec($this->account[(305 + (816 * ($i - 1)))] . $this->account[(304 + (816 * ($i - 1)))]),
                3           => hexdec($this->account[(307 + (816 * ($i - 1)))] . $this->account[(306 + (816 * ($i - 1)))]),
            );
            $char[$i]["pontos"]        = array(
                "chaos"     => 0,
                "status"    => hexdec($this->account[(1009 + (816 * ($i - 1)))] . $this->account[(1008 + (816 * ($i - 1)))]),
                "especial"  => hexdec($this->account[(1011 + (816 * ($i - 1)))] . $this->account[(1010 + (816 * ($i - 1)))]),
                "skill"     => hexdec($this->account[(1013 + (816 * ($i - 1)))] . $this->account[(1012 + (816 * ($i - 1)))])
            );
            for ($j = 1; $j <= 60; $j++) {
                $char[$i]["inventory"][$j] = array(
                    "index" => hexdec($this->account[((485 + ($j * 8)) + (816 * ($i - 1)))] . $this->account[((484 + ($j * 8)) + (816 * ($i - 1)))]),
                    "ef1"   => hexdec($this->account[((486 + ($j * 8)) + (816 * ($i - 1)))]),
                    "efv1"  => hexdec($this->account[((487 + ($j * 8)) + (816 * ($i - 1)))]),
                    "ef2"   => hexdec($this->account[((488 + ($j * 8)) + (816 * ($i - 1)))]),
                    "efv2"  => hexdec($this->account[((489 + ($j * 8)) + (816 * ($i - 1)))]),
                    "ef3"   => hexdec($this->account[((490 + ($j * 8)) + (816 * ($i - 1)))]),
                    "efv3"  => hexdec($this->account[((491 + ($j * 8)) + (816 * ($i - 1)))]),
                );
            }
        }
        return $char;
    }

    public function getChest()
    {
        $chest = array();
        for ($i = 1; $i <= 120; $i++) {
            $chest[$i] = array(
                "index" => hexdec($this->account[((3481 + ($i * 8)))] . $this->account[((3480 + ($i * 8)))]),
                "ef1"   => hexdec($this->account[((3482 + ($i * 8)))]),
                "efv1"  => hexdec($this->account[((3483 + ($i * 8)))]),
                "ef2"   => hexdec($this->account[((3484 + ($i * 8)))]),
                "efv2"  => hexdec($this->account[((3485 + ($i * 8)))]),
                "ef3"   => hexdec($this->account[((3486 + ($i * 8)))]),
                "efv3"  => hexdec($this->account[((3487 + ($i * 8)))]),
            );
        }
        return $chest;
    }
}
