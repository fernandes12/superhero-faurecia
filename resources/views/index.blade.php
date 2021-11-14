@extends('template.template')

@section('main_page')

    <h4 class="display-4 text-center">Superhero Detail</h4> <hr>
    <div class="container">

      @if(session()->has('success'))
          <div class="alert alert-success">
              {{ session()->get('success') }}
          </div>
      @endif
      @if(session()->has('error'))
          <div class="alert alert-danger">
              {{ session()->get('error') }}
          </div>
      @endif

        <div class="box">
          <h1 class="text-center">Welcome to the superhero page!</h1> 
        </div>
    </div>
      

@endsection
           