<html>
  <head>
    <title><?=$this->e($title)?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  </head>
    <nav>
        <ul>
            <li><a href="/componentstools/home">Homepage</a></li>
            <li><a href="/componentstools/about">About</a></li>
        </ul>
    </nav>
    <?=$this->section('content')?>
  </body>
</html>