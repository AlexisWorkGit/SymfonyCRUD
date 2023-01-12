<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AssetController extends AbstractController
{
    /**
     * @Route("/asset", name="app_asset")
     */
    public function css($file)
    {
        $path = $this->getParameter('kernel.project_dir') . '/public/css/' . $file;
        $content = file_get_contents($path);
        $response = new Response($content);
        $response->headers->set('Content-Type', 'text/css');
        return $response;
    }
    public function images($file)
    {
        $path = $this->getParameter('kernel.project_dir') . '/public/images/' . $file;
        $content = file_get_contents($path);
        $response = new Response($content);
        // $response->headers->set('Content-Type', 'images');
        return $response;
    }
}