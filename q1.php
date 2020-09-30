<?php
/*
[Supero] Prova Manutenção
*/

header('Content-type: text/plain; charset=utf-8');

$start = round(microtime(true) * 1000);

echo "-------------------------------------------\n";
echo sprintf("-- %s\n", "THIAGO PEREIRA DOS SANTOS");
echo "-------------------------------------------\n";

$i = 1;
$fh = fopen('input.3.in', 'r');

while ($line = fgets($fh)) {
    echo "\n";
    echo sprintf("-- Teste #%s ------------------------------\n", str_pad($i++, 2, "0", STR_PAD_LEFT));
    echo "Entrada: \t" . $line;
    echo "Saída: \t\t";

    switch (strlen(trim($line))) {
        case 13:
            // 5547984461240		MOB: +55 (47) 9 8442-1245
            echo sprintf(
                "MOB: +%s (%s) %s %s-%s",
                substr($line, 0, 2),
                substr($line, 2, 2),
                substr($line, 4, 1),
                substr($line, 5, 4),
                substr($line, 9, 4)
            );
            break;
        case 12:
            if (substr($line, 5, 1) == "3") {
                echo sprintf(
                    "RES: (%s) %s %s-%s",
                    substr($line, 0, 2),
                    substr($line, 3, 2),
                    substr($line, 4, 4),
                    substr($line, 8, 4)
                );
                break;
            }

            if (substr($line, 0, 1) == "0") {
                // 047984461240  	MOB: (47) 9 8442-1245
                echo sprintf(
                    "MOB: (%s) %s %s-%s",
                    substr($line, 1, 2),
                    substr($line, 3, 1),
                    substr($line, 4, 4),
                    substr($line, 8, 4)
                );
            } else {
                // 554784461240		MOB: +55 (47) 8442-1245
                echo sprintf(
                    "MOB: +%s (%s) %s-%s",
                    substr($line, 0, 2),
                    substr($line, 2, 2),
                    substr($line, 4, 4),
                    substr($line, 8, 4)
                );
            }
            break;
        case 11:
            if (substr($line, 0, 4) == "0800") {
                echo sprintf(
                    " NNG: %s %s %s",
                    substr($line, 0, 4),
                    substr($line, 5, 3),
                    substr($line, 6, 4)
                );
                break;
            }

            if (substr($line, 3, 1) == '3') {
                echo sprintf(
                    "RES: (%s) %s-%s",
                    substr($line, 1, 2),
                    substr($line, 3, 4),
                    substr($line, 7, 4)
                );
                break;
            }

            if (substr($line, 0, 1) == "0") {
                // 04784461240		MOB: (47) 8442-1245
                echo sprintf(
                    "MOB: (%s) %s-%s",
                    substr($line, 1, 2),
                    substr($line, 3, 4),
                    substr($line, 7, 4)
                );
            } else {
                // 47984461240		MOB: (47) 9 8442-1245
                echo sprintf(
                    "MOB: (%s) %s %s-%s",
                    substr($line, 0, 2),
                    substr($line, 2, 1),
                    substr($line, 3, 4),
                    substr($line, 7, 4)
                );
            }
            break;
        case 10:
            if (substr($line, 2, 1) == "8" || substr($line, 2, 1) == "9") {
                // 4784461240		MOB: (47) 8442-1245
                echo sprintf(
                    "MOB: (%s) %s-%s",
                    substr($line, 0, 2),
                    substr($line, 2, 4),
                    substr($line, 6, 4)
                );
            } else {
                // 4733251368		RES: (47) 3325-1378
                echo sprintf(
                    "RES: (%s) %s-%s",
                    substr($line, 0, 2),
                    substr($line, 2, 4),
                    substr($line, 6, 4)
                );
            }
            break;
        case 9:
            // 984461240			MOB: 9 8442-1245
            echo sprintf(
                "MOB: %s %s-%s",
                substr($line, 0, 1),
                substr($line, 1, 4),
                substr($line, 5, 4)
            );
            break;
        case 8:
            if (substr($line, 0, 1) == "3") {
                // 33251368			RES: 3325-1378
                echo sprintf(
                    "RES: %s-%s",
                    substr($line, 0, 4),
                    substr($line, 4, 4)
                );
            } else {
                // 84461240			MOB: 8442-1245
                echo sprintf(
                    "MOB: %s-%s",
                    substr($line, 0, 4),
                    substr($line, 4, 4)
                );
            }
            break;
        case 5:
            if (substr($line, 0, 3) == "103") {
                // 10321			ETF: 103+21
                echo sprintf("ETF: %s+%s", substr($line, 0, 3), substr($line, 3, 2));
            } elseif (substr($line, 0, 3) == "106") {
                // 10625			ETV: 10625
                echo sprintf("ETV: %s", substr($line, 0, 5));
            }
            break;
        case 4:
            // 1052					ETM: 1052
            echo sprintf("ETM: %s", substr($line, 0, 4));
            break;
        case 3:
            // 190					SUP: 190
            echo sprintf("SUP: %s", substr($line, 0, 3));
            break;
        default:
            echo sprintf("N/A: %s", $line);
            break;
    }
    echo "\n";
    echo "-------------------------------------------\n";
}
fclose($fh);
$end = round(microtime(true) * 1000);
$eta = (int) ($end - $start);

echo "\n";
echo "-------------------------------------------\n";
echo sprintf("-- PROGRAMA FINALIZADO EM %sms\n", $eta);
echo "-------------------------------------------\n";