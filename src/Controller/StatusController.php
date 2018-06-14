<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatusController {

    /**
     * Allows to easily check if the service is up querying /status
     * If you got a HTTP 200 reply with "ALIVE", it's up.
     *
     * @Route("/status")
     */
    public function status () {
        return new Response(
            "ALIVE",
            200,
            [
                "Content-Type" => "text/plain",
            ]
        );
    }

}
