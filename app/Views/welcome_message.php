<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Moje naloge</title>
    <meta name="description" content="Upam da so se slike prikazale">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

    <!-- STYLES -->

    <style>


        * {
            transition: background-color 300ms ease, color 300ms ease;
        }
        *:focus {
            background-color: rgba(221, 72, 20, .2);
            outline: none;
        }
        html, body {
            color: rgba(33, 37, 41, 1);
            font-family: "Open Sans Regular",sans-serif;
            font-size: 16px;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }
        header {
            background-color: rgba(247, 248, 249, 1);
            padding: .4rem 0 0;
        }
        .menu {
            padding: .4rem 2rem;
        }
        header ul {
            border-bottom: 1px solid rgba(242, 242, 242, 1);
            list-style-type: none;
            margin: 0;
            overflow: hidden;
            padding: 0;
            text-align: right;
        }
        header li {
            display: inline-block;
        }
        header li a {
            border-radius: 5px;
            color: rgba(0, 0, 0, .5);
            display: block;
            height: 44px;
            text-decoration: none;
        }
        header li.menu-item a {
            border-radius: 5px;
            margin: 5px 0;
            height: 38px;
            line-height: 36px;
            padding: .4rem .65rem;
            text-align: center;
        }
        header li.menu-item a:hover,
        header li.menu-item a:focus {
            background-color: rgba(221, 72, 20, .2);
            color: rgba(221, 72, 20, 1);
        }
        header .logo {
            float: left;
            height: 44px;
            padding: .4rem .5rem;
        }
        header .menu-toggle {
            display: none;
            float: right;
            font-size: 2rem;
            font-weight: bold;
        }
        header .menu-toggle button {
            background-color: rgba(221, 72, 20, .6);
            border: none;
            border-radius: 3px;
            color: rgba(255, 255, 255, 1);
            cursor: pointer;
            font: inherit;
            font-size: 1.3rem;
            height: 36px;
            padding: 0;
            margin: 11px 0;
            overflow: visible;
            width: 40px;
        }
        header .menu-toggle button:hover,
        header .menu-toggle button:focus {
            background-color: rgba(221, 72, 20, .8);
            color: rgba(255, 255, 255, .8);
        }
        header .heroe {
            margin: 0 auto;
            max-width: 1100px;
            padding: 1rem 1.75rem 1.75rem 1.75rem;
        }
        header .heroe h1 {
            font-size: 2.5rem;
            font-weight: 500;
        }
        header .heroe h2 {
            font-size: 1.5rem;
            font-weight: 300;
        }
        section {
            margin: 0 auto;
            max-width: 1100px;
            padding: 2.5rem 1.75rem 3.5rem 1.75rem;
        }
        section h1 {
            margin-bottom: 2.5rem;
        }
        section h2 {
            font-size: 120%;
            line-height: 2.5rem;
            padding-top: 1.5rem;
        }
        section pre {
            background-color: rgba(247, 248, 249, 1);
            border: 1px solid rgba(242, 242, 242, 1);
            display: block;
            font-size: .9rem;
            margin: 2rem 0;
            padding: 1rem 1.5rem;
            white-space: pre-wrap;
            word-break: break-all;
        }
        section code {
            display: block;
        }
        section a {
            color: rgba(221, 72, 20, 1);
        }
        section svg {
            margin-bottom: -5px;
            margin-right: 5px;
            width: 25px;
        }
        .further {
            background-color: rgba(247, 248, 249, 1);
            border-bottom: 1px solid rgba(242, 242, 242, 1);
            border-top: 1px solid rgba(242, 242, 242, 1);
        }
        .further h2:first-of-type {
            padding-top: 0;
        }
        footer {
            background-color: rgba(221, 72, 20, .8);
            text-align: center;
        }
        footer .environment {
            color: rgba(255, 255, 255, 1);
            padding: 2rem 1.75rem;
        }
        footer .copyrights {
            background-color: rgba(62, 62, 62, 1);
            color: rgba(200, 200, 200, 1);
            padding: .25rem 1.75rem;
        }
        @media (max-width: 629px) {
            header ul {
                padding: 0;
            }
            header .menu-toggle {
                padding: 0 1rem;
            }
            header .menu-item {
                background-color: rgba(244, 245, 246, 1);
                border-top: 1px solid rgba(242, 242, 242, 1);
                margin: 0 15px;
                width: calc(100% - 30px);
            }
            header .menu-toggle {
                display: block;
            }
            header .hidden {
                display: none;
            }
            header li.menu-item a {
                background-color: rgba(221, 72, 20, .1);
            }
            header li.menu-item a:hover,
            header li.menu-item a:focus {
                background-color: rgba(221, 72, 20, .7);
                color: rgba(255, 255, 255, .8);
            }
        }
    </style>
</head>
<body>

<!-- HEADER: MENU + HEROE SECTION -->
<header>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <div class="heroe">

        <h1>Moje Naloge</h1>

        <h2>Upam, da so se slike pokazale</h2>

    </div>

</header>

<?php

$jsonData = '[
  {
    "date": "15. 02. 2024",
    "url": "https://iprom.si/blog/kateri-programaticni-oglasevalskotehnoloski-trendi-bodo-vroci-v-2024/",
    "title": "Kateri programatični oglaševalsko-tehnološki trendi bodo vroči v 2024?",
    "image": "https://c.ipromcloud.com/16/iprom/images/Kateri-programaticni-oglasevalskotehnoloski-trendi-bodo-vroci-v-2024-iPROM-Mnenja-strokovnjakov-Simon-Struna.png",
    "category": "Mnenja strokovnjakov",
    "author": "Simon Struna"
  },
  {
    "date": "09. 02. 2024",
    "url": "https://iprom.si/blog/digitalno-oglasevanje-v-letu-2024-kako-se-pripraviti-na-korenite-spremembe/",
    "title": "Digitalno oglaševanje v letu 2024: kako se pripraviti na korenite spremembe?",
    "image": "https://c.ipromcloud.com/16/iprom/images/Digitalno-oglasevanje-v-letu-2024-kako-se-pripraviti-na-korenite-spremembe-iPROM-Novice-iz-sveta.png",
    "category": "Novice iz sveta",
    "author": "Tanja Fon"
  },
  {
    "date": "06. 02. 2024",
    "url": "https://iprom.si/blog/cookiepocalypse-2024-pot-v-neodvisno-ucinkovito-digitalno-oglasevanje/",
    "title": "Cookiepocalypse 2024: pot v neodvisno, učinkovito digitalno oglaševanje",
    "image": "https://c.ipromcloud.com/16/iprom/images/cookiepocalypse-2024-pot-v-neodvisno-ucinkovito-digitalno-oglasevanje-iPROM-Mnenje-strokovnjakov-Anze-Hribar.png",
    "category": "Mnenja strokovnjakov",
    "author": "Anže Hribar"
  },
  {
    "date": "26. 01. 2024",
    "url": "https://iprom.si/blog/umetna-inteligenca-in-njen-vpliv-na-programaticno-oglasevanje/",
    "title": "Umetna inteligenca in njen vpliv na programatično oglaševanje",
    "image": "https://c.ipromcloud.com/16/iprom/images/Umetna-inteligenca-in-njen-vpliv-na-programaticno-oglasevanje-iPROM-Novice-iz-sveta.png",
    "category": "Novice iz sveta",
    "author": "Tanja Fon"
  },
  {
    "date": "16. 01. 2024",
    "url": "https://iprom.si/blog/strateske-nalozbe-v-lastne-digitalne-medije-od-vsebin-do-zbiranja-prvoosebnih-podatkov-in-uspesnega-digitalnega-oglasevanja/",
    "title": "Strateške naložbe v lastne digitalne medije: od vsebin do zbiranja prvoosebnih podatkov in uspešnega digitalnega oglaševanja",
    "image": "https://c.ipromcloud.com/16/iprom/images/Strateske-nalozbe-v-lastne-digitalne-medije-od-vsebin-do-zbiranja-osebnih-podatkov-in-uspesnega-digitalnega-oglasevanja-iPROM-Mnenja-strokovnjakov-Andrej-Ivanec.png",
    "category": "Mnenja strokovnjakov",
    "author": "Andrej Ivanec"
  }
]
';

$dataArray = json_decode($jsonData, true);
if ($dataArray === null) {
  echo "Error decoding JSON";
}
?>

<!-- NALOGA 3 - OGLASI -->


<style>
    .card {
        width: 400px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .card-img-container {
        position: relative;
    }

    .card-img-top {
        width: 100%;
        height: auto;
    }

    .contact-info {
        position: absolute; 
        bottom: 0;
        left: 0; 
        height: 45px;
        width: 100%;
        background-color: rgba(128,128,128,0.7);
        padding: 10px;
        color: #fff;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    .card-body {
        padding: 15px;
    }
    
    .footer{
        height: 25px;
        background-color: #71C9E2;
    }
    @media only screen and (max-width: 1900px) {
        .sidebar{
          display: none;
        }
    }
    .btn-outline-primary{
        color:#71C9E2 !important;
        border-color:#71C9E2 !important;
        border-top-color: rgb(113, 201, 226);
        border-right-color: rgb(113, 201, 226);
        border-bottom-color: rgb(113, 201, 226);
        border-left-color: rgb(113, 201, 226);
    }
    .btn-outline-primary:hover{
        color: white !important;
        background-color: #71C9E2;
    }

</style>
<div style="float: left" class="sidebar">
<?php foreach ($dataArray as $datapoint): ?>
  <div class="card mb-5">
    <div class="card-img-container">
      <img src="<?php echo $datapoint['image'] ?>" alt="Image" class="card-img-top">
      <div class="contact-info">
        <p class="phone-number"><?php echo $datapoint['date'] ?></p>
      </div>
    </div>
    <div class="card-body">
      <h5 class="card-title"><?php echo $datapoint['category'] ?></h5>
      <p class="card-text"><?php echo $datapoint['title'] ?></p>
      <center>
        <a type="button" class="btn btn-outline-primary" href="<?php echo $datapoint['url'] ?>">PREBERI VEČ</a>
      </center>
    </div>
    <div class="footer">
      <center>v
        iprom
      </center>
    </div>
  </div>

<?php endforeach;
?>
</div>


<section>

  <style>
    .container_pgc{

        font-family: "Open Sans Regular",sans-serif;
        background-color: #F5F5F5;
        color: #333;;
    }
    .title{
        font-family: 'Open Sans Semibold';
    }
  </style>

  <!-- NALOGA 2 - FORM -->

  
  <h1>Naloga 2</h1>
  <div id="main-wrapper" class="container_pgc">

    <form id="formMy">
      <div id="inner-wrapper" class="m-4 pb-3">
        <h2 class="header, title">iPROM Spletna patrola</h2>

        <p id="text">Bi želeli imeti pregled nad dogajanjem v svetu digitala in novih tehnologij? <span >Prijavite se na naš mesečni novičnik Spletna patrola.</span></p>
        <div class="form-group">
          <label for="name">Ime in priimek:</label><br>
          <input class="form-control input-element input-line" type="text" name="name" id="name" required>
        </div>

        <div class="form-group">
          <label for="email">Elektronski naslov:</label><br>
          <input class="form-control input-element input-line" type="email" name="email" id="email" required>
        </div>

        <div class="form-group form-check">
          <input class="" type="checkbox" name="consent" id="consent" required>
          <label id="consent-label" for="consent">Strinjam se, da iPROM d. o. o. moje osebne podatke uporabi za namene obveščanja v obliki novičnika (Spletna patrola in sporočila za javnost).
            <br><br>
            Kadarkoli lahko zahtevate, da vaše osebne podatke popravimo, dopolnimo ali izbrišemo, s sporočilom na info@iprom.si. Več o vaših pravicah in varstvu osebnih podatkov izveste <a href="https://iprom.si/files/2018/05/iPROM_Politika_zasebnosti_GDPR.pdf ">tukaj</a>.</label>
        </div>

        <div id="close">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 24 24">
            <path id="close-icon" fill="#FFFFFF" d="M18.984 6.422l-5.578 5.578 5.578 5.578-1.406 1.406-5.578-5.578-5.578 5.578-1.406-1.406 5.578-5.578-5.578-5.578 1.406-1.406 5.578 5.578 5.578-5.578z"></path>
          </svg>
        </div>

        <button type="submit" class="btn btn-primary" style="background-color: #71C9E2; border: none">PRIJAVI SE</button>
      </div>
    </form>

    <div id="thankyou_message" style="display: none">
      <p id="text2">Zahvaljujemo se vam za prijavo na Spletno patrolo.</p>
    </div>
  </div>

  <script>
    let form = document.getElementById("formMy");

    document.getElementById("formMy").addEventListener("submit", function(event) {
      console.log("test");
      event.preventDefault(); // Prevent the form from submitting normally
      document.getElementById("thankyou_message").style.display = "block";

      saveUser(form)
        .then(responseContent => console.log(responseContent))
        .catch(err => console.error(err))

      document.getElementById("name").value = "";
      document.getElementById("email").value = "";
      document.getElementById("consent").value = 0;


    });

    async function saveUser(form) {
      const response = await fetch("https://data.iprom.si/novice/prijava", {
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        mode: 'no-cors',
        credentials: "include",
        method: 'POST',
        body: new FormData(form)
      });

      if (!response.ok)
        throw `Error response code: ${response.status}`

      return await response.json();
    }
  </script>

  <!-- NALOGA 1 - TABELE -->


  <h1>Grouped By Dates</h1>

  <table class="table">
    <thead>
    <tr>
      <th scope="col">Datum</th>
      <th scope="col">Impressions</th>
      <th scope="col">Views</th>
      <th scope="col">Clicks</th>
      <th scope="col">CTR</th>
      <th scope="col">Doseg</th>
      <th scope="col">TTA</th>


    </tr>
    </thead>
    <tbody>
    <?php foreach ($byDates as $item): ?>
    <tr>
      <td><?php echo $item['datemy'] ?></td>
      <td><?php echo $item['prikaz'] ?></td>
      <td><?php echo $item['oglas'] ?></td>
      <td><?php echo $item['klik'] ?></td>
      <td><?php  if ($item['klik'] != 0): echo ($item['klik'] / $item['prikaz']) * 100;
       else: echo 0;
       endif;
        ?></td>
      <td><?php echo $item['doseg'] ?></td>
      <td><?php echo $average ?>s</td>

    </tr>
    <?php endforeach; ?>

    </tbody>
  </table>

  <h1>Grouped By Adds</h1>

  <table class="table">
    <thead>
    <tr>
      <th scope="col">Datum</th>
      <th scope="col">Impressions</th>
      <th scope="col">Views</th>
      <th scope="col">Clicks</th>
      <th scope="col">CTR</th>
      <th scope="col">Doseg</th>

    </tr>
    </thead>
    <tbody>
    <?php foreach ($byAdds as $item): ?>
      <tr>
        <td><?php echo $item['datemy'] ?></td>
        <td><?php echo $item['prikaz'] ?></td>
        <td><?php echo $item['oglas'] ?></td>
        <td><?php echo $item['klik'] ?></td>
        <td><?php  if ($item['klik'] != 0): echo ($item['klik'] / $item['prikaz']) * 100;
          else: echo 0;
          endif;
          ?></td>
        <td><?php echo $item['doseg'] ?></td>

      </tr>
    <?php endforeach; ?>

    </tbody>    
  </table>

  
  
  <?php
  $arrayCasi = array_column($byAddsDesktops,'datemy');
  $arrayOglediDesktops = array_column($byAddsDesktops,'prikaz');
  $arrayOglediMobile = array_column($byAddsMobile,'prikaz');


  ?>
 
</section>

<style>
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 310px;
        max-width: 800px;
        margin: 1em auto;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }

</style>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
  <div id="container"></div>
  <p class="highcharts-description">
This chart demonstrates the comparison between add statistics of mobile and desktop devices.
  </p>
</figure>

<script>
  var datumi = <?php echo json_encode($arrayCasi); ?>;
  var ogledi = <?php echo json_encode($arrayOglediDesktops); ?>;
  var oglediMobile = <?php echo json_encode($arrayOglediMobile); ?>;

  console.log(datumi);
  console.log(ogledi);
  let numberArray = ogledi.map(Number);
  let numberArrayMobile = oglediMobile.map(Number);

  Highcharts.chart('container', {
    chart: {
      type: 'spline'
    },
    title: {
      text: 'Advertisement Statistics'
    },
    subtitle: {
      text: 'Source: ' +
        'Comparison of Mobile and Dekstop platforms'
    },
    xAxis: {
      categories: datumi,
      accessibility: {
        description: 'Id of advertisement'
      }
    },
    yAxis: {
      title: {
        text: 'Add'
      },
      labels: {
        format: '{value}°'
      }
    },
    tooltip: {
      crosshairs: true,
      shared: true
    },
    plotOptions: {
      spline: {
        marker: {
          radius: 4,
          lineColor: '#666666',
          lineWidth: 1
        }
      }
    },
    series: [{
      name: 'Desktop Views',
      marker: {
        symbol: 'square'
      },
      data: numberArray

    }, {
      name: 'Mobile Views',
      marker: {
        symbol: 'diamond'
      },
      data: numberArrayMobile
    }]
  });

</script>

<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<script>

</script>

<footer>


</footer>

<!-- SCRIPTS -->

!-- -->

</body>
</html>
