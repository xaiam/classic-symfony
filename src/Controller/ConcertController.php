<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ConcertController extends AbstractController
{
    /**
     * @Route("/concert", name="concert")
     */
    public function indexAction()
    {
        $concertList = [
            ['date' => '2015年5月3日', 'time' => '14:00', 'place' => '東京文化快感（満席）', 'available' => false],
            ['date' => '2015年5月3日', 'time' => '14:00', 'place' => '東京文化快感（満席）', 'available' => true],
            ['date' => '2015年5月3日', 'time' => '14:00', 'place' => '東京文化快感（満席）', 'available' => true],
            ['date' => '2015年5月3日', 'time' => '14:00', 'place' => '東京文化快感（満席）', 'available' => false],
            ['date' => '2015年5月3日', 'time' => '14:00', 'place' => '東京文化快感（満席）', 'available' => true]
        ];
        return $this->render('Concert/index.html.twig', ['concertList' => $concertList]);
    }
}
