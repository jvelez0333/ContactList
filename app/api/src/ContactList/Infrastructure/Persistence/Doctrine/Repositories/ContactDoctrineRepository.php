<?php

namespace ContactList\Infrastructure\Persistence\Doctrine\Repositories;



use ContactList\CoreDomain\Entities\Contact\Contact as ContactDomain;
use ContactList\CoreDomain\Entities\Contact\ContactCollection;
use ContactList\CoreDomain\Repositories\IContactRepository;
use ContactList\Infrastructure\Persistence\Doctrine\Entity\Contact as ContactEntity;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;

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

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function insert(ContactDomain $contact)
    {
        $this->entityManager->persist(
            ContactEntity::fromDomain($contact)
        );
        $this->entityManager->flush();
    }
}