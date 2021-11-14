@extends('template.template')

@section('main_page')
    
    <h4 class="display-4 text-center">New Superhero</h4> <hr>

    <div class="container">
      <form class="row g-3" action="{{route('api.store')}}" method="POST">
        @csrf
  
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Real Name</label>
          <input type="text" class="form-control" name="real_name" id="exampleFormControlInput1" placeholder="superhero's real name" required>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Hero Name</label>
          <input type="text" class="form-control" name="hero_name" id="exampleFormControlInput1" placeholder="superhero's name" required>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Publisher</label>
          <input type="text" class="form-control" name="publisher" id="exampleFormControlInput1" placeholder="publisher" required>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Appearance Date</label>
          <input type="date" class="form-control" name="date" id="exampleFormControlInput1" placeholder="apprearance date" required>
        </div>
        <div class="row">
          <div class="column mb-3" style="float: left; width: 50%;">
            <label for="">Abilities</label>
            @foreach ($abilities as $ability)
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="abilities[]" value="{{$ability->id}}" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  {{$ability->ability}}
                </label>
              </div>
            @endforeach
          </div>
          <div class="column mb-3" style="float: left; width: 50%;">
            <label for="">Team Affiliation</label>
            @foreach ($teams as $team)
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="teams[]" value="{{$team->id}}" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  {{$team->team}}
                </label>
              </div>
            @endforeach
          </div>
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="{{route('api.all')}}"><button type="button" class="btn btn-danger">Cancel</button></a>
        </div>
      </form>
    </div>
    

@endsection