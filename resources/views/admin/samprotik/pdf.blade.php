<!DOCTYPE html>
<html>    
<head>
<meta http-equiv="Content-Type" content="text/html;"/>
  <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://fonts.maateen.me/apona-lohit/font.css" rel="stylesheet">
    <style> 
    /* table {
    font-family: 'AdorshoLipi', sans-serif;
    font-style: normal;
    font-weight: normal;
   src: url('https://fonts.maateen.me/adorsho-lipi/font.css') format('truetype'); 
    } */
    body {
    font-family: 'AponaLohit', Arial, sans-serif !important;
    }

  </style>
</head>
<body> 

  <table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Question</th>
        <th scope="col">Answer</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $row)
      <tr>
        <th scope="row">{{ $loop->index }}</th>
        <td>{{$row->question}}</td>
        <td>{{$row->answer}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>


    
