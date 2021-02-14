<?php


class ItemService
{
    /** @var ItemDAO $itemDAO */
    private $itemDAO;

    /**
     * @return ItemDAO
     */
    private function dao(): ItemDAO
    {
        if (null === $this->itemDAO) {
            $this->itemDAO = action::dao('ItemDAO');
        }

        return $this->itemDAO;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getAllItems()
    {
        return $this->dao()->getAll();
    }

    /**
     * @param CustomObject $request
     * @return array
     * @throws Exception
     */
    public function getItem(CustomObject $request)
    {
        return $this->dao()->getById((int)$request->param('id'));
    }

    /**
     * @param CustomObject $request
     * @return mixed
     * @throws Exception
     */
    public function createItem(CustomObject $request)
    {
        return $this->dao()->create($request);
    }

    /**
     * @param CustomObject $request
     * @return bool|mysqli_result
     * @throws Exception
     */
    public function updateItem(CustomObject $request)
    {
        return $this->dao()->update($request);
    }
}