@extends('template.template')

@section('main_page')

    <h4 class="display-4 text-center">All Abilities</h4> <hr>

    <div class="container">
        <div class="box">
          <div class="row pb-5">
            <a href="#"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Add Ability
            </button></a>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add new superhero Ability</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="row g-3" action="{{route('api.store_ability')}}" method="POST">
                      @csrf
                        <div class="modal-body">
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Ability's name</label>
                            <input type="text" class="form-control" name="ability" id="exampleFormControlInput1" placeholder="" required>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
          </div>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Ability</th>
                <th scope="col">Action</th>
      
              </tr>
            </thead>
            <tbody>
                @foreach ($abilities as $ability)
                    <tr>
                        <th scope="row">{{$ability->id}}</th>
                        <td>{{$ability->ability}}</td>
                        <td>
                            <a onclick="return confirm('Do you really want to delete this ability?');" href="{{route('api.delete_ability', ['id' => $ability->id])}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
      
              </tr>
            </tbody>
          </table>
        </div>
    </div>
    
@endsection