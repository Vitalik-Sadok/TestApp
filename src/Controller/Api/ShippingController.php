<?php

namespace App\Controller\Api;

use App\Entity\Carrier;
use App\Entity\TransCompany;
use App\Entity\PackGroup;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ShippingController extends AbstractController
{
    /**
     * @Route("/api/shipping", name="api_shipping_index", methods={"GET", "POST"})
     */
    public function calculatePrice(Request $request): JsonResponse|\Symfony\Component\HttpFoundation\Response
    {
        if ($request->isMethod('POST')) {
            $weight = (float) $request->request->get('weight', 0);
            $slug = $request->request->get('carrier');
            $carrier = $this->createCarrierBySlug($slug);
            if (!$carrier instanceof Carrier) {
                return new JsonResponse(['error' => 'Invalid carrier'], 400);
            }
            $price = $carrier->calcShippingCost($weight);

            return $this->render('base.html.twig', ['price' => $price]);
//            return new JsonResponse(['price' => $price]);
        }

        return $this->render('base.html.twig', ['price' => null]);
    }



    private function createCarrierBySlug(?string $slug): ?Carrier
    {
        switch ($slug) {
            case 'TransCompany':
                return new TransCompany();
            case 'PackGroup':
                return new PackGroup();
            default:
                return null;
        }
    }

}
