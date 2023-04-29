<!DOCTYPE html> 
<html lang="pl"> 
  @include('partials.head') 
  <body> 
    @include('partials.navi') 
    <div id="zawartosc"> 
       <h1>Add Module Crew</h1> 
       <form class="form-inline" action="<?=config('app.url');?>/modulecrew/save " method="POST">
        @csrf
        <p>
            <label for="ship_module_id">Ship Module ID:</lable>
            <input type="text" id="ship_module_id" name="ship_module_id" required>
        </p>
        <p>
            <label for="nick">Nick:</label>
            <input type="text" id="nick" name="nick" required>
        </p>

       <p>
            <label for="gender">Gender:</label>
            <input type="radio" name="gender" id="gender" value="M" required>
            <label for="gender">Male</label>
            <input tupe="radio" name="gender" id="gender" value="F" required>
            <label for="gender">Female</label>
            <input tupe="radio" name="gender" id="gender" value="N" required>
            <label for="gender">No Binary</label>
        </p>
        <p>
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>
        </p>
        <p><button type="submit" class="btn btn-primary mb-2">Save</button></p>
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