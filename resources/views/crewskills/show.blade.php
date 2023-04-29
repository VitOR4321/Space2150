<!DOCTYPE html>
<html lang="pl"> 
  @include('partials.head') 
  <body> 
    @include('partials.navi') 
    <div id="zawartosc"> 
    <h1>Confirmation - Delete Id:{{$crewskill->id}}</h1> 
    <form class="form-inline" action="<?=config('app.url');?>/crewskills/delete/{{$crewskill->id}} " method="post">
        @csrf
        <p>
            <label for="id">Id: </lable>
            <input id="id" name="id" value="{{$crewskill->id}}" readonly>
        </p>
        <p>
            <label for="module_crew_id">Module Crew ID:</lable>
            <input id="module_crew_id" name="module_crew_id" value="{{$crewskill->module_crew_id}}" required>
        </p>
        <p>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{$crewskill->name}}" required>
        </p>
        <p><button type="submit" class="btn btn-primary mb-2">Delete</button></p>
       </form>
   </div> 
  </body> 
</html>