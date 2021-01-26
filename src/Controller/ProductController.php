<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\VehicleRepository;
use App\Repository\RefillStationRepository;

/**
 * Creates views that allow users to see the different products
 * @Route(name="product_")
 */
class ProductController extends AbstractController
{
    /**
     * Displays home page
     * @Route("/", name="vehicles")
     * @return Response
     */
    public function home(VehicleRepository $vehicleRepository): Response
    {
        return $this->render('front/product/home.html.twig', [
            'tourismVehicles' => $vehicleRepository->findByType('Particulier'),
            'commercialVehicles' => $vehicleRepository->findByType('Utilitaire'),
        ]);
    }

    /**
     * Displays informations about the charging stations
     * @Route("/nos-solutions-de-ravitaillement", name="charging_stations")
     * @return Response
     */
    public function chargingStations(RefillStationRepository $refillRepository): Response
    {
        return $this->render('front/product/charging_stations.html.twig', [
            'refillStations' => $refillRepository->findAll(),
        ]);
    }
    /**
     * Displays informations about vehicle
     * @Route("/vehicule/{id<^[0-9]+$>}", name="vehicle")
     * @return Response
     */
    public function vehicle(VehicleRepository $vehicleRepository, int $id): Response
    {
        return $this->render('front/product/vehicle.html.twig', [
            'vehicle' => $vehicleRepository->findOneBy(
                ['id' => $id
                ]
            )
        ]);
    }
}
