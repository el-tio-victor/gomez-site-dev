@if($errors->has($name))
<span id='exampleInputPassword1-error' class='error invalid-feedback' style='display:block'>{{
     $errors->first($name) 
    }}</span>@endif