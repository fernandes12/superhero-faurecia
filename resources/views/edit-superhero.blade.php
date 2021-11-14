@extends('template.template')

@section('main_page')
    
    <h4 class="display-4 text-center">Edit Superhero</h4> <hr>

    <div class="container">
      <form class="row g-3" action="{{route('api.update')}}" method="POST">
        @csrf
  
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Real Name</label>
          <input type="text" class="form-control" name="real_name" id="exampleFormControlInput1" value="{{$superhero->real_name}}" required>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Hero Name</label>
          <input type="text" class="form-control" name="hero_name" id="exampleFormControlInput1"  value="{{$superhero->hero_name}}" required>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Publisher</label>
          <input type="text" class="form-control" name="publisher" id="exampleFormControlInput1"  value="{{$superhero->publisher}}" required>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Appearance Date</label>
          <input type="date" class="form-control" name="date" id="exampleFormControlInput1"  value="{{$superhero->date}}" required>
        </div>
        <div class="row">
          <div class="column mb-3" style="float: left; width: 50%;">
            <label for="">Abilities</label>
            @foreach ($abilities as $ability)
              @php
                  $superhero_abilities = DB::table('ability_superheroes')->where('superhero_id', $superhero->id)->where('ability_id', $ability->id)->first();
                  $superhero_teams = DB::table('team_superheroes')->where('superhero_id', $superhero->id)->where('team_id', $ability->id)->first();
              @endphp
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="abilities[]" value="{{$ability->id}}" id="flexCheckDefault"
                @if ($superhero_abilities)
                  checked
                @endif
                 >
                <label class="form-check-label" for="flexCheckDefault">
                  {{$ability->ability}}
                </label>
              </div>
            @endforeach
          </div>
          <div class="column mb-3" style="float: left; width: 50%;">
            <label for="">Team Affiliation</label>
            @foreach ($teams as $team)
              @php
                  $superhero_teams = DB::table('team_superheroes')->where('superhero_id', $superhero->id)->where('team_id', $team->id)->first();
              @endphp
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="teams[]" value="{{$team->id}}" id="flexCheckDefault" 
                @if ($superhero_teams)
                  checked
                @endif
                >
                <label class="form-check-label" for="flexCheckDefault">
                  {{$team->team}}
                </label>
              </div>
            @endforeach
          </div>
        </div>
        <div class="mb-3">
          <input type="hidden" class="form-control" name="id" id="exampleFormControlInput1"  value="{{$superhero->id}}">
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{route('api.all')}}"><button type="button" class="btn btn-danger">Cancel</button></a>
        </div>
      </form>
    </div>
    

@endsection