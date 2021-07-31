@extends('layouts.appLanding')
@section('activeContact')
    active
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div id="Address">
                    <address>
                        <label class="h3">Unistore, Inc.</label><br>
                        Lima Peru<br>
                        San Francisco, CA 94102<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>

                    <address>
                        <strong>Support</strong><br>
                        <a href="mailto:#">sup@example.com</a>
                        <br><br>

                        <strong>Partners</strong><br>
                        <a href="mailto:#">col@example.com</a>
                    </address>
                </div>
            </div>
            <div class="col-sm-8">
                <div id="GoMap"></div>
            </div>
        </div>
        <br>
    </div>

    <div class="gray">
        <div class="container align-center">
            <h1> Need our help? </h1>
            <p> Please select a question above first so we can connect you <br class="visible-md visible-lg"> to the right agent. </p>

            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <form class="formContact" action="{{route('store.contact')}}" method="post">
                        @csrf

                        <input type="text" name="name" value="" placeholder="Enter Name" required="" class="form-control" />
                        <br>

                        <input type="email" name="email" value="" placeholder="Enter Email" required="" class="form-control" />
                        <br>

                        <textarea class="form-control" name="message" placeholder="Message" required="" rows="5"></textarea>
                        <br>

                        <button type="submit" class="btn btn-primary justify"> Enviar pregunta <i class="ion-android-send"></i> </button>
                    </form>
                </div>
            </div>
        </div>
        <br>
    </div>

    <hr class="offset-lg">
    <hr class="offset-lg">

    @if(session('info'))
        <script>
            alert("{{session('info')}}");
        </script>
    @endif

@endsection



