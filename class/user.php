<?php

require_once 'conection.php';

class user
{

    /*
     * metod for save names of users
     */
    public function newUser($data)
    {
        //session_start();
        try {

            if (!filter_var($data['name'], FILTER_SANITIZE_STRING)) {
                $res = ['state' => 0, 'msg' => 'El nombre no es valido.'];
                echo json_encode($res);

                return;
            }
            if (!filter_var($data['last_name'], FILTER_SANITIZE_STRING)) {
                $res = ['state' => 0, 'msg' => 'El apellido no es valido.'];
                echo json_encode($res);

                return;
            }

            $date = date('Y-m-d H:i:s');

            $result = Conection::getInstance()->prepare("insert into users (names, last_names) 
                                                  values (?, ?)");
            $result->bindParam(1, $data['name'], PDO::PARAM_STR);
            $result->bindParam(2, $data['last_name'], PDO::PARAM_STR);
            $result->execute();


            if ($result->rowCount()) {
                $res = ['state' => 1, 'msg' => 'El usuario se a registrado correctamente'];
            } else {
                $res = ['state' => 0, 'msg' => 'Ah ocurrido un error interno intentalo nuevamente.'];
            }
            echo json_encode($res);

        } catch (Exception $e) {
            echo 'Error ' . $e->getMessage();
        }
    }

}

