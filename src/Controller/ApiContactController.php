<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ApiContactController extends AbstractController
{
    /**
     * @Route("/api/contacts/add-email", name="api_contact_add_email", methods={"POST"})
     * {@inheritdoc}
     */
    public function email(Request $request)
    {
        return new JsonResponse(['ok']);
    }
}
