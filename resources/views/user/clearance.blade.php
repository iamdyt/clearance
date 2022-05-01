<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clearance Certificate</title>

    <style>
                body {
            font-family: Roboto;
        }
        .container{
            max-width: 100%;
            margin: 0 auto;      
            max-height: 100%;
            padding: 1rem 0px;
        }
        .certificate-container {
            padding: 50px;
            width: 1024px;
            /* margin: auto; */
        }
        .certificate {
            border: 2px solid #0C5280;
            padding: 25px;
            height: 600px;
            position: relative;
        }

        .certificate:after {
            content: '';
            top: 0px;
            left: 0px;
            bottom: 0px;
            right: 0px;
            position: absolute;
            background-image: url("{{asset('images/logo2fade.png')}}");
            background-size: 100%;
            z-index: -1;
        }

        .certificate-header > .logo {
            width: 80px;
            height: 80px;
        }

        .certificate-title {
            text-align: center; 
            font-size: 1.5rem;   
        }

        .certificate-body {
            text-align: center;
        }

        h1 {

            font-weight: 400;
            font-size: 48px;
            color: #0C5280;
        }

        .student-name {
            font-size: 24px;
        }

        .certificate-content {
            margin: 0 auto;
            width: 750px;
            font-size: 1.5rem;
            text-align: center;
        }

        .about-certificate {
            width: 380px;
            margin: 0 auto;
        }

        .topic-description {

            text-align: center;
            font-size: 1.5rem;
        }

    </style>
</head>
<body>

    <section class="container">
        <div class="certificate-container">
            <div class="certificate">
                <div class="water-mark-overlay"></div>
                <div class="certificate-header">
                    <img src="{{asset('images/logoede.png')}}" class="logo" alt="">
                </div>
                <div class="certificate-body">
                   
                    <p class="certificate-title">
                        <strong>The Federal Polytechnic Ede, Osun State</strong> <br>
                        <small>Private Mail Bag 231, Ede, Osun State, Nigeria.</small>
                    </p>
                    <h1>Final Student Clearance</h1>
                    <p class="student-name" style="text-transform: uppercase; font-weight:bold;"> {{auth()->user()->name}} / {{auth()->user()->regNumber}}</p>
                    <div class="text-center">
                        <div class="topic-description">
                            <p>
                        I am pleased to inform you that having fulffilled the requirements for the award of <strong>{{$detail->level}}</strong> of this Polytechnic, the Academic Board has approved that you be awarded the <strong>{{$detail->level}}</strong> in the department of  <strong>{{$detail->department}}</strong>
                        </p>
                        </div>
                        {{-- <p class="topic-title">
                            The Topic consists of [hours] Continuity hours and includes the following:
                        </p> --}}
                        <div class="text-center">
                            <p class="topic-description text-muted">The effective date of the award of the Diploma is <span class="font-weight:bold ! important;">{{date('d/m/y') }}</span>  on behalf of the <strong>Rector</strong>, I wish to congratulate you on your success in the Examination.</p>
                        </div>
                    </div>
                    <div class="certificate-footer text-muted">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Registrar: ______________________</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>