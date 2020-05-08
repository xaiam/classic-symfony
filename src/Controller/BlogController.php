<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\BlogArticle;

class BlogController extends AbstractController
{
    public function latestList()
    {
        $this->test();
        $em = $this->getDoctrine()->getManager();
        $blogArticleRepository = $em->getRepository(BlogArticle::class);

        $blogList = $blogArticleRepository->findBy([], ['targetDate' => 'DESC']);

        return $this->render('Blog/latestList.html.twig', [
            'blogList' => $blogList,
        ]);
    }

    public function test()
    {

    }
}
