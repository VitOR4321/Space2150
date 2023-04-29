<!DOCTYPE html> 
<html lang="pl"> 
  @include('partials.head') 
  <body> 
    @include('partials.navi') 
    <div id="zawartosc"> 
       <h1>Edit module</h1> 
       <form class="form-inline" action="<?=config('app.url');?>/shipmodules/update/{{$shipmodule->id}}" method="post">
        @csrf
        <p>
            <label for="module_name">Id:</lable>
            <input id="id" name="id" value="{{$shipmodule->id}}" readonly>
        </p>
        <p>
            <label for="module_name">Module Name:</lable>
            <input id="module_name" name="module_name" value="{{$shipmodule->module_name}}" size="25" required>
        </p>
        <p>
            <label for="is_workable">Is Workable:</label>

            <input type="radio" name="is_workable" id="is_workable" value=1 @if ($shipmodule->is_workable) checked @endif required>
            <label for="is_workable">True</label>
            <input tupe="radio" name="is_workable" id="is_workable" value=0 @if (!($shipmodule->is_workable)) checked @endif required>
            <label for="is_workable">False</label>
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