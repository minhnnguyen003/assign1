<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="The Homepage for the topic Streaming Media" />
  <meta name="keywords" content="HTML, Form, tags" />
  <meta name="author" content="Ahmed Fuzail Mohamed Imran" />
  <title>Home Page</title>
  <link rel="shortcut icon" type="image/jpg" href="favicon.ico" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link href="./styles/style.css" type="text/css" rel="stylesheet">
</head>

<body id="index">

  <?php
    require('./navbar.inc');
  ?>

  <h1 id="index-html-head-title">Streaming Media and The Future It Holds</h1>
  <section class="content">
    <p>
      Streaming Media. It is a fundamental part of our lives. Whether it is streaming videos on YouTube, streaming
      movies on Netflix or streaming songs
      on Spotify, we all do it. But what exactly is Streaming Media and how does it affect our future and if it has any
      implications. </p>

    <p>
      Streaming Media is the process of delivering multimedia data (such as video or audio) from a streaming service
      provider to an end-user. Streaming Media delivers audio and video elements using basic HTTP, TCP/IP, and HTML
      protocols.
      Video or audio content is streamed (i.e. transmitted) over the Internet in compressed form. It is then played back
      immediately, rather than being saved to the hard drive for playback at a later time.
    </p>

    <p>
      This eliminates the need to wait for a file to be completely downloaded before viewing or listening.
      Unless content is being streamed live, users are able to pause, rewind, or fast-forward, just as they would with a
      downloaded file. Furthermore, since data order is unimportant, Streaming Media is sent and received according to
      network availability.
    </p>
    <article class="reference">
      <h3>Reference</h3>
      <p class="left-aligned">Anon 2022, Streaming Media, viewed 2 April, 2022, <a class="reference-link link white"
          href="https://www.haivision.com/resources/streaming-video-definitions/streaming-media/" target="_blank"
          rel="noopener noreferrer">https://www.haivision.com/resources/streaming-video-definitions/streaming-media/</a>.
      </p>
    </article>
    <p>Click the button below for an in-depth dive into Streaming Media!</p>
    <form action="./topic.php" method="get">
      <button id="more" type="submit">Click For More</button>
    </form>
  </section>
  
  <?php
    require('./footer.inc')
  ?>


</body>

</html>