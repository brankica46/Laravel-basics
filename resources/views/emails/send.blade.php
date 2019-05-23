<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equip="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Email received from contact page</title>
  </head>
  <body>
    <h1>Sa kontakt strane sajta je poslao/la email: {{ $name }}</h1>
    <blockquote>
      Njegov email je: <h2>{{ $email }}</h2>
      <h3>Tema poruke je {{ $subject }}</h3>

      <p>
        Poruka glasi: {{$mail_message}}
      </p>
    </blockquote>
  </body>
</html>
