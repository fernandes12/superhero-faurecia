@extends('template.template')

@section('main_page')

    <h4 class="display-4 text-center">All Superheros</h4> <hr>

    <div class="container">
        <div class="box">
          <div class="row pb-5">
            <a href="{{route('api.create')}}"><button type="button" class="btn btn-primary">Add Superhero</button></a>
          </div>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Real Name</th>
                <th scope="col">Hero Name</th>
                <th scope="col">Publisher</th>
                <th scope="col">Appearance Date</th>
                <th scope="col">Action</th>
      
              </tr>
            </thead>
            <tbody>
                @foreach ($superheros as $superhero)
                    <tr>
                        <th scope="row">{{$superhero->id}}</th>
                        <td>{{$superhero->real_name}}</td>
                        <td>{{$superhero->hero_name}}</td>
                        <td>{{$superhero->publisher}}</td>
                        <td>{{$superhero->date}}</td>
                        <td>
                            <a href="{{route('api.view', ['id' => $superhero->id])}}" class="btn btn-warning">View</a>
                            <a href="{{route('api.edit', ['id' => $superhero->id])}}" class="btn btn-success">Edit</a>
                            <a onclick="return confirm('Do you really want to delete the superhero?');" href="{{route('api.delete', ['id' => $superhero->id])}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
      
              </tr>
            </tbody>
          </table>
        </div>
    </div>
    
@endsection