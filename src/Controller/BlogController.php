<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    public function latestListAction()
    {
        $blogList = [
        ['targetDate' => '2015年3月15日', 'title' => '東京公演レポート'],
        ['targetDate' => '2015年3月15日', 'title' => '東京公演レポート'],
        ['targetDate' => '2015年3月15日', 'title' => '東京公演レポート'],
        ];

        return $this->render('Blog/latestList.html.twig', [
            'blogList' => $blogList,
        ]);
    }
}
