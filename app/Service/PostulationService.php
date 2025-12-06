<?php

namespace App\Service;

use App\Repositories\PostulationRepository;
use Exception;

class PostulationService
{
    public function __construct(
        private PostulationRepository $postulation
    ) { }

    public function getPostulationsSend(int $career_id) {
        $postulation = $this->postulation->getPostulationSendCareerEnable($career_id);

        return $postulation;
    }

    public function getPostulationSend(int $postulation_id) {
        $postulation = $this->postulation->getPostulationSendStudentEnable($postulation_id);

        if(is_null($postulation)) {
            throw new Exception("No se encontró la postulación");
        }

        return $postulation;
    }

}
