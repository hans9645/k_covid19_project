<?php
    $link = mysqli_connect("localhost","wotjd2979","123456", "k_covid19");
    if( $link === false )
    {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    echo "Coneect Successfully. Host info: " . mysqli_get_host_info($link) . "\n";
?>
<style>
    table {
        width: 100%;
        border: 1px solid #444444;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #444444;
    }
</style>
<body>
    <h1 style="text-align:center"> Region Information </h1>
    <hr style = "border : 5px solid yellowgreen">
    <?php
        $sql="select count(*) as num from region";
        $result = mysqli_query($link, $sql);
        $data = mysqli_fetch_assoc($result);
    ?>
    <p>
        <h3>Region Info table (Currently <?php echo $data['num']; ?>) regions in database </h3>
    </p>

    <table cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Code</th>
            <th>Province</th>
            <th>City</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Elementary_school_count</th>
            <th>Kindergarten_count</th>
            <th>Academy_ratio</th>
            <th>Elderly_population_ratio</th>
            <th>Nursing_home_count</th>
        </tr>
        </thead>
        <tbody>
            <?php
                $sql = "select * from region";
                $result = mysqli_query($link,$sql);
                while( $row = mysqli_fetch_assoc($result)  )
                {
                    print "<tr>";
                    foreach($row as $key => $val)
                    {
                        print "<td>" . $val . "</td>";
                    }
                    print "</tr>";
                }
            ?>
            
        </tbody>
    </table>


</body>