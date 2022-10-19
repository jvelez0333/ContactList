<?php

namespace ContactList\Infrastructure\Persistence\Doctrine\Repositories;



use ContactList\CoreDomain\Entities\Contact\Contact as ContactDomain;
use ContactList\CoreDomain\Entities\Contact\ContactCollection;
use ContactList\CoreDomain\Repositories\IContactRepository;
use ContactList\Infrastructure\Persistence\Doctrine\Entity\Contact as ContactEntity;


class ContactDoctrineRepository extends DoctrineRepository implements IContactRepository
{
    protected function entityClassName(): string
    {
        return ContactEntity::class;
    }


    public function getAllByPageNumber(int $page): ContactCollection
    {
        //todo:limitar e implementar paginación.
        $contacts = $this->repository->findAll();

        $contactCollection = ContactCollection::init();

        if (!empty($contacts)) {
            foreach ($contacts as $contact) {
                $contactCollection->add($contact->toDomain());
            }
        }

        return $contactCollection;
    }


    public function insert(ContactDomain $contact)
    {

        $contactEntity=ContactEntity::fromDomain($contact);

        $this->entityManager->persist(
            $contactEntity
        );
        //todo:resolver problema al guardar en base de datos.
        $this->entityManager->flush();


    }
}