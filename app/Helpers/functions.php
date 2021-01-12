<?php
	function convertDateScreen($data) {
        if($data == '' || is_null($data)) {
            return null;
        }

		$date = explode('-', $data);
		$newDate = $date[2] . "/" . $date[1] . "/" . $date[0];
		return $newDate;	
	}

	function convertDateDb($data) {
        if($data == '' || is_null($data)) {
            return null;
        }
        
		$date = explode('/', $data);
		$newDate = $date[2] . "-" . $date[1] . "-" . $date[0];
		return $newDate;
	}

    function convertDecimalDb($price) {
        $price = str_replace('.', '', $price);
        $price = str_replace(',', '.', $price);
        return $price;
    }

    function formatCoin($value) {
        return number_format($value, 2, ',', '.');
    }

    function verifyEmail($email) {
        if(!preg_match("/^([a-zA-Z0-9.-_])*([@])([a-z0-9]).([a-z]{2,3})/", $email)) {
            return false;
        }
        else {
            //Valida o dominio
            $dominio = explode('@',$email);

            if(!checkdnsrr($dominio[1], 'A')) {
                return false;
            }
            else {
                // Retorno true para indicar que o e-mail é valido
                return true;
            }
        }
    }
?>