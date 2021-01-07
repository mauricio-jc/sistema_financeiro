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

	function sanitizePhone($phone) {
        $phone = str_replace('(', '', $phone);
        $phone = str_replace(')', '', $phone);
        $phone = str_replace(' ', '', $phone);
        $phone = str_replace('-', '', $phone);
        return $phone;
	}

    function sanitizeCpf($cpf) {
        $cpf = str_replace('.', '', $cpf);
        $cpf = str_replace('-', '', $cpf);
        return $cpf;
    }

    function sanitizeCnpj($cnpj) {
        $cnpj = str_replace('.', '', $cnpj);
        $cpf = str_replace('/', '', $cnpj);
        return $cnpj;
    }

    function convertDecimalDb($price) {
        $price = str_replace('.', '', $price);
        $price = str_replace(',', '.', $price);
        return $price;
    }

    function formatCoin($value) {
        return number_format($value, 2, ',', '.');
    }

    function convertCents($valor) {
        return str_replace('.', '', $valor);
    }

    function formatWeight($value) {
        return number_format($value, 3, ',', '.');
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

    function getExplodeIdClient($client) {
        $arrClient = explode(' - ', $client);
        return $arrClient[0];
    }

    function translateStatus($status) {
        switch ($status) {
            case 'processing':
                return 'Processando';
                break;
            case 'authorized':
                return 'Autorizado';
                break;
            case 'paid':
                return 'Pago';
                break;
            case 'waiting_payment':
                return 'Aguardando pagamento';
                break;
            case 'analyzing':
                return 'Analisando';
                break;
            case 'pending_refund':
                return 'Reembolso pendente';
                break;
            case 'pending_refund':
                return 'Cobrado de volta';
                break;
            case 'pending_review':
                return 'Revisão pendente';
                break;
            case 'expired':
                return 'Vencido';
                break;
            default:
                return '';
                break;
        }
    }

    function translatePayment($payment, $boletoUrl = null) {
        if($payment == 'dinheiro') {
            return 'Dinheiro';
        }

        if($payment == 'credit_card') {
            return 'Cartão de crédito';
        }
        
        if($payment == 'boleto') {
            echo "<a href='$boletoUrl' target='_blank'>Imprimir boleto</a>";
        }
    }


    function getParcelas($valor) {
        if($valor <= 99) {
            $parcelas = 1;
        }
        else if($valor > 99 && $valor <= 150) {
            $parcelas = 2;
        }
        else if($valor > 150 && $valor <= 250) {
            $parcelas = 3;
        }
        else if($valor > 250 && $valor <= 350) {
            $parcelas = 4;
        }
        else if($valor > 350 && $valor <= 450) {
            $parcelas = 5;
        }
        else if($valor > 450 && $valor <= 550) {
            $parcelas = 6;
        }
        else if($valor > 550 && $valor <= 650) {
            $parcelas = 7;
        }
        else if($valor > 650 && $valor <= 750) {
            $parcelas = 8;
        }
        else if($valor > 750 && $valor <= 850) {
            $parcelas = 9;
        }
        else if($valor > 850 && $valor <= 950) {
            $parcelas = 10;
        }
        else if($valor > 950 && $valor <= 1199) {
            $parcelas = 11;
        }
        else {
            $parcelas = 12;
        }

        return $parcelas;
    }

?>