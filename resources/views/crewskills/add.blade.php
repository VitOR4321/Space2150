<!DOCTYPE html> 
<html lang="pl"> 
  @include('partials.head') 
  <body> 
    @include('partials.navi') 
    <div id="zawartosc"> 
       <h1>Add Crew Skills</h1> 
       <form class="form-inline" action="<?=config('app.url');?>/crewskills/save " method="POST">
        @csrf
        <p>
            <label for="module_crew_id">Module Crew ID:</lable>
            <input type="text" id="module_crew_id" name="module_crew_id" required>
        </p>
        <p>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
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