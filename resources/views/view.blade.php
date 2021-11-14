@extends('template.template')

@section('main_page')
    
    <h4 class="display-4 text-center">Superhero Detail</h4> <hr>
    <div class="container">
        <div class="box">
            <form class="row g-2">
                <h5>Real Name: <span style="font-weight: normal; font-size: 14pt;">{{$superhero->real_name}}</span></h5>
                <h5>Hero Name: <span style="font-weight: normal; font-size: 14pt;">{{$superhero->hero_name}}</span></h5>
                <h5>Publisher: <span style="font-weight: normal; font-size: 14pt;">{{$superhero->publisher}}</span></h5>
                <h5>Date: <span style="font-weight: normal; font-size: 14pt;">{{$superhero->date}}</span></h5><hr>
                <h4>List of Abilities/Power:</h4><hr>
                    @forelse ($hero_abilities as $hero_ability)
                        <li>{{$hero_ability->ability}}</li> 
                    @empty
                        <i>No abilities</i>
                    @endforelse 
                <h4>Team Afiliations:</h4>
                    @forelse ($hero_teams as $hero_team)
                        <li>{{$hero_team->team}}</li>
                    @empty
                        <i>No team affiliated</i>
                    @endforelse
            </form>
        </div>
    </div>
    

@endsection