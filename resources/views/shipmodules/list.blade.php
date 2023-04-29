<!DOCTYPE html> 
<html lang="pl"> 
  @include('partials.head') 
  <body> 
    @include('partials.navi') 
    <div id="zawartosc"> 
       <h1>Modules List</h1> 
       <table> 
        <thead> 
          <tr> <th>ID</th> <th>Module Name</th> <th>Is Workable</th> </tr> 
        </thead> 
        <tbody> 
          @foreach($ship_modules as $el) 
            <tr> 
              <td>{{$el->id}}</td> 
              <td>{{$el->module_name}}</td> 
              <td>{{$el->is_workable}}</td>
              <td><a href="<?=config('app.url');?>/shipmodules/edit/{{$el->id}}">Edit</a></td> 
              <td><a href="<?=config('app.url');?>/shipmodules/show/{{$el->id}}">Del</a></td> 
            </tr> 
          @endforeach 
        </tbody> 
      </table> 
   </div> 
  </body> 
</html>