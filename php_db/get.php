<?php
$link = mysqli_connect('localhost', 'test', 'a1s2d3f4', 'test');
if ($link == false)
{
    print ('errorL ' . mysqli_connect_error());
}
else
{
    $a = $_POST['username'];
    $sql = 'SELECT code, name FROM rdy WHERE name LIKE  "%' . $a . '%" OR code="' . $a . '"';
    $result = mysqli_query($link, $sql);
    echo '
    <!doctype html>

    <html>

    <head>
      <title>Какие-то коды</title>
      <meta charset="utf-8">
      <meta name="description" content="Какие-то коды">
      <meta name="author" content="yolololalo">
      <meta name="viewport" content="width=device-width,initial-scale=1" />
      <meta content="true" name="HandheldFriendly" />
      <meta content="width" name="MobileOptimized" />
      <meta content="yes" name="apple-mobile-web-app-capable" />

      <link rel="stylesheet" href="sasha_css/styles.css?v=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>

    <body>
      <nav>
        <div class="nav-wrapper blue">
          <a href="#" class="brand-logo center">Результаты</a>
          <ul id="nav-mobile" class="left">
            <li><a href="../index.html"><i class="material-icons left">chevron_left</i></a></li>
          </ul>
        </div>
      </nav>
      <div class="container">
      <div class="row">
        <div class="col s12">
        </div>
      </div>
    ';

    echo '
    <div class="row">
      <div class="col s12">
      <h4><blockquote> ' . $a . '</blockquote></h4>

    <ul class="collapsible">
    ';

    if (mysqli_num_rows($result) > 0)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            echo '
            <li>
              <div class="collapsible-header">Код:
                ' . $row["code"] . '
              </div>
              <div class="collapsible-body">
                <p>' . $row["name"] . '</p>
              </div>
            </li>';
        }
    }
    else
    {
        echo '
        <li>
          <div class="collapsible-header">
            Не найдено
          </div>
          <div class="collapsible-body">
            Ничего не нашлось, надо писать что-то типа "хлеб", "молоко", "сосиски" и т.д.
          </div>
        </li>';
    }
    echo '
    </ul>
    </div>
    </div>
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
      var elems = document.querySelectorAll(".collapsible");
      var instances = M.Collapsible.init(elems);
    });
    </script>
    </html>
    ';
} ?>
