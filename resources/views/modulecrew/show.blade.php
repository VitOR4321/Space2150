<!DOCTYPE html>
<html lang="pl"> 
  @include('partials.head') 
  <body> 
    @include('partials.navi') 
    <div id="zawartosc"> 
    <h1>Confirmation - Delete Id:{{$modulecrew->id}}</h1> 
    <form class="form-inline" action="<?=config('app.url');?>/modulecrew/delete/{{$modulecrew->id}} " method="post">
        @csrf
        <p>
            <label for="id">Id: </lable>
            <input id="id" name="id" value="{{$modulecrew->id}}" readonly>
        </p>
        <p>
            <label for="ship_module_id">Ship Module ID:</lable>
            <input id="ship_module_id" name="ship_module_id" value="{{$modulecrew->ship_module_id}}" required>
        </p>
        <p>
            <label for="nick">Name:</label>
            <input type="text" id="nick" name="nick" value="{{$modulecrew->nick}}" required>
        </p>
        <p><button type="submit" class="btn btn-primary mb-2">Delete</button></p>
       </form>
   </div> 
  </body> 
</html>