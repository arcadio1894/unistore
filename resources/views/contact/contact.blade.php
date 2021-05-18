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
                        1305 Market Street, Suite 800<br>
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
    @if ($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
   </div>
   @endif
    <div class="gray">
        <div class="container align-center">
            <h1> Need our help? </h1>
            <p> Please select a question above first so we can connect you <br class="visible-md visible-lg"> to the right agent. </p>

            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <form class="contact" action="{{route('show.contact.store')}}" method="post">
                        @csrf
                        <textarea class="form-control" name="message" placeholder="Message" required="" rows="5"></textarea>
                        <br>

                        <input type="email" name="email" value="" placeholder="E-mail" required="" class="form-control" />
                        <br>
                        <input type="text" name="name" value="" placeholder="Contact name" required="" class="form-control" />
                        <br>
                        <input type="text" name="phone" value="" placeholder="Telephone number" required="" class="form-control" />
                        <br>

                        <button type="submit" class="btn btn-primary justify"> Send question <i class="ion-android-send"></i> </button>
                    </form>
                </div>
            </div>
        </div>
        <br>
    </div>
    <hr class="offset-lg">
    <hr class="offset-lg">
@endsection
