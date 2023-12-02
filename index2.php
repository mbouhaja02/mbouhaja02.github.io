<!DOCTYPE html>
<html>
<head>
    <title>Covoiturage</title>
    <link rel="icon" type="image/x-icon" href="LOGOV1.0.png">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background: linear-gradient(#003249, #CCDBDC); /* Dégradé de bleu */
            padding-top: 80px;
            margin: 0;
        }


        .column {
            float: left;
            width: 50%;
        }

        .row::after {
            content: "";
            display: table;
            clear: both;
            overflow: auto;
            margin: auto;
        }

        .column1 {
            float: left;
            width: 33.33%;
            margin-bottom: 0px;
        }

        .button{
            background-image: radial-gradient(#495057, #343a40, #212529);
            border: none;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 24px;
            border-radius: 12px;
            width: 95%;

            margin-top: auto;
            margin-bottom: 10px;
            margin-right: auto;
            margin-left: auto;
            color: #adb5bd;
        }

        /* spacing out icon and text in button */
        .button i {
            margin-right: 10px;
        }

        img {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            width: auto;
            margin-top: 5px;
            margin-left: auto;
            margin-right: auto;
            display: block;
        }

        .card {
            width=auto;
            height=auto;
        }
        
        #row_ad {
            height=75%;
            margin-bottom: 10%;
        }


        
    </style>

    <?php include('php/header2.php'); ?>

<div class="row">
    <div class="column"> 
        <img src="./img/carpool_index.png" alt="car" width=100%>    
    </div>
    <div class="column"> 
        <div class="row" id="row_ad">
            <div class="card">
                <h2>Pick your next adventure ...</h2> 
                <h2>... Paris ?</h2> 
                <h2>... Toulouse ?</h2> 
                <h2>... Mulhouse ?</h2>  
                <h2>... Lyon ?</h2> 
            </div>
        </div>
        <div class="row">
            <div class="column">
                <button class="button" ><i class="fas fa-search" style="color: #adb5bd;"></i>Search for a ride</button>
            </div>
            <div class="column">
                <button class="button"><i class="fas fa-plus" style="color: #adb5bd;"></i></i>Publish a ride</button>
            </div>
       </div>  
    </div>
</div>
<div class="row">
    <div class="column1"> 
        <h2>Share meaningful moments...</h2>    
    </div>
    <div class="column1"> 
        <h2>At a low price...</h2>    
    </div>
    <div class="column1"> 
        <h2>Within a protected environment...</h2>    
    </div>
</div>
<?php include('php/footer.php'); ?>
</body>
</html>
