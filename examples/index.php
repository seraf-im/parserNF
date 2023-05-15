<?php
$groups = ['A', 'B', 'BA', 'C', 'D', 'E', 'F', 'G', 'GA', 'H', 'I', 'I01', 'I03', 'I05', 'I07', 'I80', 'J', 'K', 'L', 'LA', 'LB', 'M', 'N', 'NA', 'O', 'P'];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exemplos parserNF</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style type="text/css">
    body {
      min-height: 100vh;
    }

    main {
      display: flex;
      flex-wrap: nowrap;
      height: 100vh;
      max-height: 100vh;
      overflow-x: auto;
      overflow-y: hidden;
      flex-direction: row;
      justify-content: space-between;
      align-items: stretch;
    }

    .content {
      overflow-x: auto;
      width: 100%;
      padding: 0px 15px;
    }

    .nav-link {
      cursor: pointer;
    }
  </style>
</head>

<body class="vsc-initialized">

  <main>
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
          <use xlink:href="#bootstrap" />
        </svg>
        <span class="fs-4">ParserNF</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto" style="overflow: auto">
        <?php foreach ($groups as $group) {
          echo "<li class='nav-item'><a class='nav-link text-white' group='$group'>Grupo $group</a></li>";
        }
        ?>
      </ul>
    </div>
    <div class="content"></div>
  </main>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script>
    $(function() {
      $.get('home.php', (result) => {
        $(".content").html(result);
      });
      $(".nav-link").click(function(e) {
        let group = $(this).attr('group');

        $.get(group.toLowerCase() + '.php', (result) => {
          $(".content").html(result);
        });
      })
    })
  </script>
</body>

</html>