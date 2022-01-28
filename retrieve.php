<?php
include_once 'database.php';
$result = mysqli_query($conn, "SELECT * FROM userinfo");
?>
<!DOCTYPE html>
<html>

<head>
    <title> Retrive data</title>
</head>

<body>
    <table>
        <tr>
            <td>User Name</td>
            <td>Email</td>
            <td>CF Handle</td>
            <td>AC Handle</td>
            <td> CC Handle</td>
            <td> Uva Handle</td>
        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            if ($i % 2 == 0)
                $classname = "even";
            else
                $classname = "odd";
        ?>
            <tr class="<?php if (isset($classname)) echo $classname; ?>">
                <td><?php echo $row["userName"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["handleCf"]; ?></td>
                <td><?php echo $row["handleAc"]; ?></td>
                <td><?php echo $row["handleCc"]; ?></td>
                <td><?php echo $row["handleUv"]; ?></td>
            </tr>
        <?php
            $i++;
        }
        ?>
    </table>
</body>

</html>