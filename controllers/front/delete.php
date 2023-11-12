<?php

class DeleteAccountDeleteModuleFrontController extends ModuleFrontController
{

    public function initContent()
    {
        parent::initContent();

        $idUser = (int) Tools::getValue('id_user');

        if($idUser > 0)
        {
            
            $objCustomer = new Customer();

            if($objCustomer->customerIdExistsStatic($idUser))
            {
                $sql = 'DELETE FROM '._DB_PREFIX_.'customer WHERE id_customer = ' . $idUser;

                Db::getInstance()->execute($sql);

                Tools::redirect('index.php');
            }
        }
        
    }
}