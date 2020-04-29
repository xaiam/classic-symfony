<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ToppageController extends AbstractController
{
    /**
     * @Route("/", name="toppage")
     */
    public function indexAction()
    {
        $information = '5月と６月の買う円情報を追加しました';
        return $this->render('Toppage/index.php.twig', ['information' => $information]);
    }
}
