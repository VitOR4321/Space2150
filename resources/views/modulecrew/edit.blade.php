<!DOCTYPE html> 
<html lang="pl"> 
  @include('partials.head') 
  <body> 
    @include('partials.navi') 
    <div id="zawartosc"> 
       <h1>Edit Module Crew </h1> 
       <form class="form-inline" action="<?=config('app.url');?>/modulecrew/update/{{$modulecrew->id}}" method="post">
        @csrf
        <p>
            <label for="ship_module_id">Ship Module ID:</lable>
            <input type="text" id="ship_module_id" name="ship_module_id" value="{{$modulecrew->ship_module_id}}" readonly>
        </p>
        <p>
            <label for="nick">Nick:</label>
            <input type="text" id="nick" name="nick" value="{{$modulecrew->nick}}" required>
        </p>

       <p>
            <label for="gender">Gender:</label>
            <input type="radio" name="gender" id="gender" value="M" @if ($modulecrew->gender) checked @endif required>
            <label for="gender">Male</label>
            <input tupe="radio" name="gender" id="gender" value="F" @if ($modulecrew->gender) checked @endif required>
            <label for="gender">Female</label>
            <input tupe="radio" name="gender" id="gender" value="N" @if ($modulecrew->gender) checked @endif required>
            <label for="gender">No Binary</label>
        </p>
        <p>
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" value="{{$modulecrew->age}}" required>
        </p>
        <p><button type="submit" class="btn btn-primary mb-2">Update</button></p>
       </form>
       <p>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
       </p>
   </div> 
  </body> 
</html>