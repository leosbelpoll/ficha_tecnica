<?php

namespace App\Controller;

use App\Entity\Fcoches;
use App\Entity\Ficha;
use App\Form\VehiculoType;
use BridgeBundle\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Vehiculo;
use Symfony\Component\Validator\Constraints\Date;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Finder\Finder;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $users = $em->getRepository('App:User')->findAll();
        $vehiculos = $em->getRepository('App:Vehiculo')->findAll();
        $entity_add = new Vehiculo();
        

        $spanish = new Ficha();
        $spanish->setIdioma('Spanish');
        $english = new Ficha();
        $english->setIdioma('English');
        $frances = new Ficha();
        $frances->setIdioma('Frances');
        $italiano = new Ficha();
        $italiano->setIdioma('Italiano');
        $aleman = new Ficha();
        $aleman->setIdioma('Aleman');
        $portugues = new Ficha();
        $portugues->setIdioma('Portugues');

        $spanish2 = new Fcoches();
        $spanish2->setIdioma('Spanish');
        $english2 = new Fcoches();
        $english2->setIdioma('English');
        $frances2 = new Fcoches();
        $frances2->setIdioma('Frances');
        $italiano2 = new Fcoches();
        $italiano2->setIdioma('Italiano');
        $aleman2 = new Fcoches();
        $aleman2->setIdioma('Aleman');
        $portugues2 = new Fcoches();
        $portugues2->setIdioma('Portugues');

        $entity_add->addFicha($spanish);
        $entity_add->addFicha($english);
        $entity_add->addFicha($frances);
        $entity_add->addFicha($italiano);
        $entity_add->addFicha($aleman);
        $entity_add->addFicha($portugues);

        $entity_add->addFcoch($spanish2);
        $entity_add->addFcoch($english2);
        $entity_add->addFcoch($frances2);
        $entity_add->addFcoch($italiano2);
        $entity_add->addFcoch($aleman2);
        $entity_add->addFcoch($portugues2);

        $form_add = $this->createForm(VehiculoType::class, $entity_add, [
            'method' => 'POST',
        ]);

        $archivos = $this->archivosAction();

        if($request->getMethod() == 'POST'){
            $form_add->handleRequest($request);
            if($form_add->isValid()){
                $entity_add->setUsuario($user);
                $entity_add->setEstado('new');
                $entity_add->setCreacion(new \DateTime('now') );

                if($entity_add->getFechaFin() != null){
                if($entity_add->getFechaInicio() > $entity_add->getFechaFin()){
                    $this->get('session')->getFlashBag()->add('danger',
                        'El año inicial no puede ser mayor al año final.');

                        return $this->render('default/index.html.twig', array('form' => $form_add->createView(), 'users' => $users, 'vehiculos' => $vehiculos, 'archivos' => $archivos));
                }}

                $spanish->setVehiculo($entity_add);
                $english->setVehiculo($entity_add);
                $frances->setVehiculo($entity_add);
                $italiano->setVehiculo($entity_add);
                $aleman->setVehiculo($entity_add);
                $portugues->setVehiculo($entity_add);

                $spanish2->setVehiculo($entity_add);
                $english2->setVehiculo($entity_add);
                $frances2->setVehiculo($entity_add);
                $italiano2->setVehiculo($entity_add);
                $aleman2->setVehiculo($entity_add);
                $portugues2->setVehiculo($entity_add);

                foreach($entity_add->getFiles() as $files){
                    $files->setVehiculo($entity_add);
                }

                

                $em->persist($spanish);
                $em->persist($english);
                $em->persist($frances);
                $em->persist($italiano);
                $em->persist($aleman);
                $em->persist($portugues);

                $em->persist($spanish2);
                $em->persist($english2);
                $em->persist($frances2);
                $em->persist($italiano2);
                $em->persist($aleman2);
                $em->persist($portugues2);

                try {
                    $em->persist($entity_add);
                    $em->flush();
                } catch (\Exception $e) {
                    $this->get('session')->getFlashBag()->add('danger',
                        'Ha ocurrido el siguiente error tratando de guardar en la base de datos:    ' . $e->getMessage());

                        return $this->render('default/index.html.twig', array('form' => $form_add->createView(), 'users' => $users, 'vehiculos' => $vehiculos, 'archivos' => $archivos));
                }

                $this->get('session')->getFlashBag()->add('success',
                    'Su vehiculo se ha agregado correctamente. Gracias por usar nuestros servicios.');
                return $this->redirectToRoute('homepage');
            }
        }

        return $this->render('default/index.html.twig', array('form' => $form_add->createView(), 'users' => $users, 'vehiculos' => $vehiculos, 'archivos' => $archivos));
    }

    /**
     * @Route("/edit/{id}", name="edit", )
     */
    public function editAction($id, Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $vehiculo = $em->getRepository('App:Vehiculo')->find($id);

        $users = $em->getRepository('App:User')->findAll();
        $vehiculos = $em->getRepository('App:Vehiculo')->findAll();

        $form_add = $this->createForm(VehiculoType::class, $vehiculo);

        $archivos = $this->archivosAction();

        if($request->getMethod() == 'POST'){
                 $original = new ArrayCollection();

                // Create an ArrayCollection of the current Tag objects in the database
                foreach ($vehiculo->getFiles() as $file) {
                    $original->add($file);
                }

            $form_add->handleRequest($request);
            if($form_add->isValid()){

                $vehiculo->setCreacion(new \DateTime('now') );
                $vehiculo->setEstado('edited');

                if($vehiculo->getFechaFin() != null){
                    if($vehiculo->getFechaInicio() > $vehiculo->getFechaFin()){
                        $this->get('session')->getFlashBag()->add('danger',
                            'El año inicial no puede ser mayor al año final.');
                        return $this->render('default/index.html.twig', array('form' => $form_add->createView(), 'users' => $users, 'vehiculos' => $vehiculos, 'files' => $vehiculo->getFiles(), 'archivos' => $archivos, 'estado' => $vehiculo->getEstado(), 'dueno' => $vehiculo->getUsuario()));
                    }}

                    foreach($vehiculo->getFiles() as $file){
                        if($file->getVehiculo() === null){
                        $file->setVehiculo($vehiculo);
                        }
                    }


                foreach ($original as $file) {
                    if (false === $vehiculo->getFiles()->contains($file)) {


                        $vehiculo->getFiles()->removeElement($file);

//                      $file->getVehiculo()->removeElement($vehiculo);

                        // if it was a many-to-one relationship, remove the relationship like this file
//                        $file->setVehiculo(null);

//                        $em->persist($file);

                        // if you wanted to delete the Tag entirel//y, you can also do that
                         $em->remove($file);
                    }
                }

                $em->persist($vehiculo);
                $em->flush();

                $this->get('session')->getFlashBag()->add('success',
                    'Su vehiculo se ha editado correctamente. Gracias por usar nuestros servicios.');

                return $this->redirectToRoute('homepage');
            }
        }

        return $this->render('default/index.html.twig', array('form' => $form_add->createView(), 'users' => $users, 'vehiculos' => $vehiculos, 'files' => $vehiculo->getFiles(), 'archivos' => $archivos, 'estado' => $vehiculo->getEstado(), 'dueno' => $vehiculo->getUsuario()));

    }

    /**
     * @Route("/pagar/{id}/{estado}", name="cambiar", )
     */
    public function cambiarAction($id, $estado, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $em2 = $this->getDoctrine()->getManager('customer');
        $vehiculo = $em->getRepository('App:Vehiculo')->find($id);
        $vehiculo->setEstado($estado);
        if ($estado == 'cobrados'){
            $pagar = (count($vehiculo->getFiles()) * 0.5) + ($vehiculo->getCanti() * 0.10) - ($vehiculo->getPagado());
            $pagado = $pagar + $vehiculo->getPagado();
            $vehiculo->setPagado($pagado);
            $usuario = $em2->getRepository('BridgeBundle:User')->findOneByEmail($this->getUser()->getEmail());
            if($usuario){
                $t = $pagar + $usuario->getCant();
                $usuario->setCant($t);
                $em2->persist($usuario);
            }else{
                $us = new User();
                $us->setEmail($this->getUser()->getEmail());
                $us->setCant($pagar);
                $em2->persist($us);
            }
            $em2->flush();
        }
        $em->persist($vehiculo);
        $em->flush();

        $this->get('session')->getFlashBag()->add('success',
            'El vehiculo se ha enviado a la lista correctamente. Gracias por usar nuestros servicios.');

        return $this->redirectToRoute('homepage');
    }

    protected function archivosAction(){
        $em = $this->getDoctrine()->getManager();
        $finder = new Finder();
        $files = $finder->files()->in($_ENV['files']);
        $result = array();
        foreach ($files as $file){
            $result += $em->getRepository('App:File')->findByName($file->getRelativePathname());
        }
        return $result;
    }

    /**
     * @Route("/del/{id}", name="del", )
     */
    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $vehiculo = $em->getRepository('App:Vehiculo')->find($id);

        if (!$vehiculo) {
            throw $this->createNotFoundException('Unable to find Vehiculo entity.');
        }

        $em->remove($vehiculo);
        $em->flush();

        $this->get('session')->getFlashBag()->add('success',
            'El vehiculo se ha eliminado correctamente.');

        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route("/us/{ext}", name="us", )
     */
    public function filesbyuserAction($ext, Request $request)
    {
        $finder = new Finder();
        $files = $finder->files()->in($this->getParameter('archivos').$this->getUser()->getUsername());

        $result = array();
        $con = 0;
        foreach ($files as $key => $file){
            $name = $file->getRelativePathname();
            $cortar = explode('.', $name);
            if($cortar[1] == $ext){
                $result[$con] = $name;
                $con++;
            }
        }
        return new JsonResponse(json_encode($result));


    }
}
