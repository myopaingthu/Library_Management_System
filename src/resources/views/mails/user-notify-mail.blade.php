<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Book Return Date Overdue</h1>
  <div>Books</div>
  @foreach ($book_names as $book_name)
    {{ $book_name }}
  @endforeach
  <div>The book you issued is overdued. Please kindly returned as soon as possible.</div>
</body>

</html>
