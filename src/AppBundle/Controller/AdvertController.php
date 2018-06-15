<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Advert;
use AppBundle\Form\AdvertType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdvertController extends Controller
{


  /**
  * @Route("/addform", name="addform")
  */
  public function addAction(Request $request)
  {
    //Creation d'un objet Advert
    $advert = new Advert();

    // creation du formulaire a l'aide du AdvertType
    $form = $this->get('form.factory')->create(AdvertType::class, $advert);

    //Si la requete est en post (donc si le formulaire a été valider)
    if ($request->isMethod('POST') ){

      // on fait le lien entre la requete et le formulaire, $advert contient les données rentrés par le gars
      $form->handleRequest($request);

      // si le formulaire est valide
      if ($form->isValid()){

        //on enregistre dans la BDD
        $em = $this->getDoctrine()->getManager();
        $em->persist($advert);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

        // On redirige vers la page d'accueil (le homepage a verifier? / ?)
        return $this->redirectToRoute('homepage');
      }
    }
    // sinon, on affiche le formulaire. (en gros c'est la parti controlleur de base)
    return $this->render('advert/advert.html.twig',array(
      'form'=>$form->createView(),
    ));
  }
}
