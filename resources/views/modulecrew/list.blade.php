<!DOCTYPE html> 
<html lang="pl"> 
  @include('partials.head') 
  <body> 
    @include('partials.navi') 
    <div id="zawartosc"> 
       <h1>Module Crew List</h1> 
       <table> 
        <thead> 
          <tr> <th>ID</th> <th>Ship Module ID</th> <th>Nick</th> <th>Gender</th> <th>Age</th> </tr> 
        </thead> 
        <tbody> 
          @foreach($module_crew as $el) 
            <tr> 
              <td>{{$el->id}}</td> 
              <td>{{$el->ship_module_id}}</td> 
              <td>{{$el->nick}}</td>
              <td>{{$el->gender}}</td>
              <td>{{$el->age}}</td>
              <td><a href="<?=config('app.url');?>/modulecrew/edit/{{$el->id}}">Edit</a></td> 
              <td><a href="<?=config('app.url');?>/modulecrew/show/{{$el->id}}">Del</a></td> 
            </tr> 
          @endforeach 
        </tbody> 
      </table> 
   </div> 
  </body> 
</html>