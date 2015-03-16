<?php


class csv
{
    private $_csvFile = null;
    /**
     * @param string $csvFile
     */
    public function __construct($csvFile)
    {
        if (file_exists($csvFile)) {
            $this->_csvFile = $csvFile;
        } else {
            throw new Exception("File $csvFile not found");
        }
    }

    public function setCSV(Array $csv)
    {
        $handle = fopen($this->_csvFile, "a");
        foreach ($csv as $value) {
            fputcsv($handle, explode(";", $value), ";");
        }
        fclose($handle);
    }

    public function getCSV()
    {
        $handle = fopen($this->_csvFile, "r");

        $arrayLineFull = array();
        while (($line = fgetcsv($handle, 0, ",")) !== FALSE) {
            $arrayLineFull[] = $line;
        }
        fclose($handle);
        return $arrayLineFull;
    }
}

echo '<h3>Ruby on Rails</h3>'."\n";
echo '<table style="margin:0 0 15px;">'."\n";
echo '<tbody>'."\n";
echo '<tr>
        <td style="width: 300px;"><strong>Name</strong></td>
        <td style="width: 100px;"><strong>Serial number</strong></td>
        <td style="text-align: right; width: 100px;"><strong>Awarded on</strong></td>
    </tr>'."\n";
try {
    $csv = new CSV("GeekHub certified list (eng) - 2014 - Ruby on Rails+.csv");
    $getCsv=$csv->getCSV();
    function makeColum($value){
        echo "\t\t".'<td>'.$value[0].'</td>'."\n";
        echo "\t\t".'<td style="text-align: right;">'.$value[4].'</td>'."\n";
        echo "\t\t".'<td style="text-align: right;">04/26/2014</td>'."\n";

    }
    function makeLine($value){
        echo"\t<tr>\n";
        echo makeColum($value);
        echo "\t</tr>\n";

    }
    foreach($getCsv as $value){
        echo makeLine($value);

    }
}
catch (Exception $e){
    echo "Arror: ".$e->getMessage();
}
echo"</tbody>\n";
echo"</table>";
