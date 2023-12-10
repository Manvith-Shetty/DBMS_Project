<?php
  require_once('config\host.php');
  $query = "select * from anime";
  $res = mysqli_query($con, $query);

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manvith's Anime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="anime-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Caveat&family=Libre+Baskerville&display=swap" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Anime</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
    </nav>

    <div id="anime-status" class="list-status-display">
      <div class="heading">
        <a href="javascript:allAnime()">All Anime</a>
        <a href="javascript:watching()">Watching</a>
        <a href="javascript:completed()">Completed</a>
        <a href="javascript:dropped()">Dropped</a>
        <a href="javascript:onHold()">On Hold</a>
        <a href="javascript:planToWatch()">Plan to Watch</a>
      </div>

      <div id="list-status" class="list">
        <div id="all-anime-list" class="all-anime">
          <table class="all-anime-status">
            <thead>
          <tr>
            <th>#</th>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Genre</th>
            <th>Episodes</th>
            <th>Duration</th>
            <th>Average Rating</th>
            <th>Release Date</th>
            <th>Watch Link</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <?php
              while($row = mysqli_fetch_assoc($res))
              {
            ?>
            <td><?php echo $row['anime_id']; ?></td>
            <td> <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['cover_img']) . '" style="height: 100px; width: 80px" />';?> </td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['genre']; ?></td>
            <td><?php echo $row['episodes']; ?></td>
            <td><?php echo $row['duration']; ?></td>
            <td><?php echo $row['avg_rating']; ?></td>
            <td><?php echo $row['release_date']; ?></td>
            <td><a href="<?php echo $row['watch_link']; ?>">Watch</td>

          </tr>
            <?php
              }
            ?>
            </tbody>
          </table>
        </div>  
      </div>
    </div>

      <script type="text/javascript">
        function allAnime()
        {
          $( '#list-status').load(location.href + " #all-anime-list");
        }
        function watching()
        {
          $( '#list-status').load(location.href + " #watching-list");
        }
        function completed()
        {
          $( '#list-status').load(location.href + " #list-status");
        }
        function dropped()
        {
          $( '#list-status').load(location.href + " #list-status");
        }
        function onHold()
        {
          $( '#list-status').load(location.href + " #list-status");
        }
        function planToWatch()
        {
          $( '#list-status').load(location.href + " #list-status");
        }
      </script>
    </div>
  </body>