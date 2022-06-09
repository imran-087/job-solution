
<!DOCTYPE html>
<html lang="en">
<head>
    <!--<meta http-equiv="Content-Type" content="text/html; charset=utf8mb4">-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samprotik Question</title>
    
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <style>
    
        p {
            margin-bottom: 0;
        }

        .main-body {
            position: relative;
            width: 1350px;
            border: solid 1px black;
            margin:auto;
        }

        .heading {
            background-color: #84BA3F;
            padding: 5px;
            position: relative;
            color:#fff;
        }

        .heading h1 {
            
            font-size: 60px;
        }
        .heading h4 {
            
            font-size: 35px;
        }
        .heading h1,
        h4 {
            text-align: center;
            font-weight: bold;
        }

        .source-title {
            position: absolute;
            top: 10%;
            left: 83%;
        }

        .sub-title {
                color: #fff;
                text-align: center;
                font-size: 50px;
                font-weight: bold;
                width: 750px;
                background-color: #84BA3F;
                margin: auto;
                margin-top: 20px;
                padding: 10px;

        }

        .question {
            padding: 0px 10px 10px 0;
            font-size: 30px;
            color:#138d3e;
        }

        .question-border {
            border-right: solid 3px #84BA3F;
        }

        .question-body {
            margin: 20px;
        }

        .water-mark {
            position: absolute;
            opacity: .3;
            height: 200px;
            width: 200px;
            left: 50%;
            margin-left: -100px;
            top: 50%;
            margin-top: -100px;
        }

        .logo {
            position: absolute;
        }

        .header-table {
            width: 100%;
            text-align: center;
            font-weight: bold;
            margin-top: 6px;
            margin-bottom: 10px;
        }

        footer {
            padding: 25px 0 0 0;
            color:#fff;
        }

        .footer-table {

            font-size: 12px;
            width: 100%;
            font-weight: bold;
            background-color: #84BA3F;
        }

        .footer-vartical-line {
            height: 35px;
            width: 2px;
            background: #000;
            position: absolute;
            bottom: 10px;
            left: 387px;
        }
    </style>
</head>
<body>
    
        <a href="{{ route('admin.dashboard')}}" class="btn btn-sm btn-success"><i class="fa fa-home"></i> Back to home</a>
   
    
    <div class="main-body area-border" id="html-content-holder">

        <img class="water-mark" src="{{ asset('assets') }}/media/logos/satt-logo.png">

        <div class='heading'>
            <img class="logo" width="100px" height="100px" src="{{ asset('assets') }}/media/logos/satt-logo.png">

            <h1> স্যাট একাডেমি </h1>
             <!--<h6>সাম্প্রতিক প্রশ্নোত্তর | মার্চ ২০২২  </h6> -->
             <h4>সাম্প্রতিক প্রশ্নোত্তর |  তারিখঃ <?= date('d/m/Y'); ?></h4>
             

            <h3 class="source-title" style="color:black">সূত্র:  প্রথম আলো <span style="margin-left:5px; color:black"> <br></span></h3>
        </div>
 
        <div class="sub-title mt-4 mb-5">
            বাংলাদেশ ও আন্তর্জাতিক বিষয়াবলি
        </div>

        <div class="question-body">
             <!--Question start -->
            <div class="row">
                @foreach($questions as $question)
                <div class="col-6 question-border">
                    <table>
                        <tr VALIGN=TOP>
                            <td>
                                <img src=" " style="margin-top: 10px; margin-left:10px;">
                            </td>
                            <td>
                                <p style="margin-left: -100px; font-weight:bold;" class="question text-justify">{{ $question->question }}</p>
                            </td>
                        </tr>
                        <tr  VALIGN=TOP>
                            <td>
                                <p style="margin-left: 70px;   font-size:28px"> উত্তরঃ  &nbsp;   </p>
                            </td>
                            <td>
                                <p style="text-align: justify;  font-size: 28px">{{ $question->answer }} </p>
                            </td>
                        
                        </tr>
                         
                         
                       
                    </table>
                </div>
                @endforeach
            </div>
            <!--Question end -->
           
        </div>

        <footer>

            <table class="footer-table">
                <tr>
                    <td>
                        <h5 style="text-align:center;margin:8px; font-size:40px"> <i> শিক্ষা হোউক "বাণিজ্য" মুক্ত  -  স্যাট একাডেমি     </i></h5>  
                    </td>
                </tr>
            </table>
             
        </footer>

    </div>
    <!-- <a id="btn-Convert-Html2Image" href="#"></a> -->
    <div class="text-center m-3">
             <button class="btn btn-sm btn-info text-center" id="btnConvert1">Download Image</button>
         </div>
    
    <br/>


    <div class="d-flex justify-content-center align-content-center " >
        {{ $questions->links() }}
    </div>

 
</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>   
<script src="{{ asset('/js/html2canvas.js') }}"></script>

  <script>
         $("#btnConvert1").on('click', function () {
                html2canvas(document.getElementById("html-content-holder")).then(function (canvas) {                   
                   var anchorTag = document.createElement("a");
                    document.body.appendChild(anchorTag);
                    // document.getElementById("previewImg").appendChild(canvas);
                    anchorTag.download = "samprotik.jpg";
                    anchorTag.href = canvas.toDataURL(); 
                    anchorTag.target = '_blank';
                    anchorTag.click();
                });
    });
 
    </script>
