<?php
session_start();

$dataTable = [];

if (isset($_GET['search'])) {
    $_SESSION['message_error_search'] = '';
    $keyword = $_GET['search'];
    $dataTable = search($keyword);
}

function search($keyword = '') // function paramaternya optional
{
    // get data dari database;
    $database = [
        (object) [
            'name' => 'Mas Burhan',
            'score' => '80',
        ],
        (object) [
            'name' => 'Abi',
            'score' => '90'
        ],
        (object) [
            'name' => 'Han',
            'score' => '80'
        ],
        (object) [
            'name' => 'Novizar',
            'score' => '60'
        ],
    ];

    $dataResult = $database; // masukkin database untuk dijadikan default result

    if ($keyword != '') { // jika dia masukkan keyword
        $dataResult = []; // default result diganti dengan array kosong untuk dimasukkan data baru
        foreach ($database as $i => $value) { // listing semua data yg di database
            $a = strtolower($value->name); // convert string jadi huruf kecil
            if (strpos($a, $keyword) !== false) { // dilakukan pengecekan jika dia ada bagian yg sama dgn keyword
                $dataResult[$i] = $value;
            }
        }
    }

    return convertData($dataResult); // convert format datanya
}

function convertData($data)
{
    $result = [];
    foreach ($data as $index => $value) {
        $result[$index] = (object) [
            'name' => $value->name,
            'score' =>  $value->score,
            'status' => $value->score > 80 ? 'Graduate' : 'Failed' 
        ];
    }
    return $result;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result</title>
</head>

<body>
    <table>
        <th>
            <tr>
                <td>
                    Name
                </td>
                <td>
                    Score
                </td>
                <td>
                    Status
                </td>
            </tr>
        </th>
        <?php
        foreach ($dataTable as $value) {
            echo "<tr>
            <td>$value->name</td>
            <td>$value->score</td>
            <td>$value->status</td>
            </tr>";
        }
        ?>
    </table>
</body>

</html>