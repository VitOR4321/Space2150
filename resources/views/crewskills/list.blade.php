<!DOCTYPE html> 
<html lang="pl"> 
  @include('partials.head') 
  <body> 
    @include('partials.navi') 
    <div id="zawartosc"> 
       <h1>Crew Skills List</h1> 
       <table> 
        <thead> 
          <tr> <th>ID</th> <th>Module Crew ID</th> <th>Name</th> </tr> 
        </thead> 
        <tbody> 
          @foreach($crew_skills as $el) 
            <tr> 
              <td>{{$el->id}}</td> 
              <td>{{$el->module_crew_id}}</td> 
              <td>{{$el->name}}</td>
              <td><a href="<?=config('app.url');?>/crewskills/edit/{{$el->id}}">Edit</a></td> 
              <td><a href="<?=config('app.url');?>/crewskills/show/{{$el->id}}">Del</a></td> 
            </tr> 
          @endforeach 
        </tbody> 
      </table> 
   </div> 
  </body> 
</html>