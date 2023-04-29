<!DOCTYPE html>
<html lang="pl"> 
  @include('partials.head') 
  <body> 
    @include('partials.navi') 
    <div id="zawartosc"> 
    <h1>Confirmation - Delete Id:{{$shipmodule->id}}</h1> 
    <form class="form-inline" action="<?=config('app.url');?>/shipmodules/delete/{{$shipmodule->id}} " method="post">
        @csrf
        <p>
            <label for="id">Id: </lable>
            <input id="id" name="id" value="{{$shipmodule->id}}" readonly>
        </p>
        <p>
            <label for="module_name">Module Name: </lable>
            <input id="module_name" name="module_name" value="{{$shipmodule->module_name}}" size="25" readonly required>
        </p>
        <p><button type="submit" class="btn btn-primary mb-2">Delete</button></p>
       </form>
   </div> 
  </body> 
</html>