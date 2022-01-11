<?php

namespace App\Entidy;

use \App\Db\Database;

use \PDO;


class Alinhamento
{


    public $id;
    public $data;
    public $valor1;
    public $valor2;
    public $caixa_id;
    public $mecanicos_id;

    public function cadastar()
    {


        $obdataBase = new Database('alinhamento');

        $this->id = $obdataBase->insert([

        'data'              => $this->data,
        'valor1'            => $this->valor1,
        'valor2'            => $this->valor2,
        'caixa_id'          => $this->caixa_id,
        'mecanicos_id'      => $this->mecanicos_id

        ]);

        return true;
    }



    public function atualizar()
    {
        return (new Database('alinhamento'))->update('id = ' . $this->id, [

            
        'data'              => $this->data,
        'valor1'            => $this->valor1,
        'valor2'            => $this->valor2,
        'caixa_id'          => $this->caixa_id,
        'mecanicos_id'      => $this->mecanicos_id
        ]);
    }


    public static function getList($fields = null, $table = null, $where = null, $order = null, $limit = null)
    {

        return (new Database('alinhamento'))->select($fields, $table, $where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }



    public static function getQtd($fields = null, $table = null, $where = null, $order = null, $limit = null)
    {

        return (new Database('alinhamento'))->select('COUNT(*) as qtd', 'alinhamento', null, null)
            ->fetchObject()
            ->qtd;
    }


    public static function getID($fields, $table, $where, $order, $limit)
    {
        return (new Database('alinhamento'))->select($fields, $table, 'id = ' . $where, $order, $limit)
            ->fetchObject(self::class);
    }

  

    public function excluir()
    {
        return (new Database('alinhamento'))->delete('id = ' . $this->id);
    }


    public static function getUsuarioPorEmail($email)
    {

        return (new Database('alinhamento'))->select('email = "' . $email . '"')->fetchObject(self::class);
    }
}
