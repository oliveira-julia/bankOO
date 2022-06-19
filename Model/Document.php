<?php

class Document
{
    private string $cpfNumber;

    public function __construct(string $cpfNumber)
    {
        $this->cpfNumber = $cpfNumber;
        $this->validateCpf($cpfNumber);
    }


    public function getcpf(): string
    {
        return $this->maskCpf($this->cpfNumber, "###.###.###-##");
    }

    public function checkDocument($cpfNumber)
    {
        $cpf = $cpfNumber;

        if(empty($cpf)) {
            return false;
        }
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        if (strlen($cpf) != 11) {
            return false;
        }
        else if ($cpf == '00000000000' ||
            $cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999') {
            return false;

        } else {

            for ($t = 9; $t < 11; $t++) {

                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf[$c] * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] != $d) {
                    return false;
                }
            }

            return true;
        }
    }

    public function validateCpf($cpfNumber)
    {
        if ($this->checkDocument($cpfNumber) == false)
        {
            echo ("The document is invalid"), PHP_EOL;
        }
    }

    public function maskCpf($cpfNumber,$format )
    {
        $return = '';
        $position_value = 0;
        for($i = 0; $i<=strlen($format)-1; $i++) {
            if($format[$i] == '#') {
                if(isset($valor[$position_value])) {
                    $return .= $cpfNumber[$position_value++];
                }
            } else {
                $return .= $format[$i];
            }
        }
        return $return;
    }
}

