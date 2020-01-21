<?php

namespace App\Controller;

use App\Entity\Composition;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompositionController extends AbstractController
{
    /**
     * @Route("/{id}", name="composition_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Composition $composition, Product $product): Response
    {
        if ($this->isCsrfTokenValid('delete' . $composition->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($composition);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_product_index');
    }
}
