<?php
$connection = mysqli_connect("localhost", "root", "password");
mysqli_select_db($connection, "database");
if (isset($_GET['search'])) {
    $find_data = $_GET['searching'];
    if ($find_data == '') {
        echo "<p>We use a keyword based search mechinism so try typing an artist or band name</p>";
        exit();
    }
    // I am assuming we will continue using the table called bands for the forseeable future okay?
    $search_query = "select * from bands where songs like '%$find_data%'";
    $start_search = mysqli_query($connection, $search_query);
    if (mysqli_num_rows($run_result) < 1) {
    // these are not the droids you are looking for!
        echo "<p>MusicSearch was unable to find the music you are looking for</p>";
        exit();
    }
    while ($data_found = mysqli_fetch_array($start_search)) {
        $band_name = $data_found['band_name'];
        $download = $data_found['download'];
        $description = $data_found['description'];
        
    echo "<div class='found'>
		<h1>$band_name</h1>
		<a href='$download' target='_blank'>$download</a>
		<p align='justify'>$description</p> 
		</div>
		";
		}
    }
