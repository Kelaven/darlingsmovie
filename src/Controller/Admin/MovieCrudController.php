<?php

namespace App\Controller\Admin;

use App\Entity\Movie;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType;


class MovieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Movie::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Film')
            ->setEntityLabelInPlural('Films');
    }



    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            // TextField::new('picture'), // Utilise-le lorsque tu veux afficher ou éditer du texte court, comme un titre ou un nom. C'est adapté pour des données qui n'ont pas besoin d'un éditeur de texte complet.
            TextField::new('pictureFile')->setFormType(VichImageType::class),
            ImageField::new('picture')->setBasePath('/uploads/picture')->onlyOnIndex(),
            TextField::new('name'),
            TextField::new('duration'),
            DateField::new('release_date'), // DateField / DateTimeField: Utilisés pour les champs de date ou de date et heure.
            NumberField::new('review'), // NumberField: Utilisé pour les champs numériques, qu'il s'agisse d'entiers ou de nombres à virgule flottante.
            TextField::new('trailer'),
            TextEditorField::new('synopsis'), // Utilise-le lorsque tu veux permettre à l'utilisateur de saisir ou éditer du texte plus long, par exemple une description.
            AssociationField::new('category'),
            AssociationField::new('actors')->setFormTypeOption('by_reference', false), // il fallait utiliser setFOrmTypeOption pour que les modif soient prises en compte. Cette option indique à Symfony de traiter la relation comme étant non référencée par l'entité principale, ce qui est nécessaire pour les relations many-to-many où la relation est gérée par une table intermédiaire.
        ];
    }
}
