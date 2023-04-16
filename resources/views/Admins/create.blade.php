<!DOCTYPE html>
<html lang="en">
    
  <head>
   
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gestion des incidents</title>
  </head>
  <body>
<form method="POST" action="{{route('admins.store')}}">
    @csrf
    <div>
        <label for='username'>username</label>
        <input name="username" id="username" type="text">
    </div>
    <div>
        <label for='email'>email</label>
        <input name="email" id="email" type="email">
    </div>
    <div>
        <label for='password'>password</label>
        <input name="password" id="password" type="password">
    </div>
 

   
    <button type="submit">Add</button>
</form>
</body>
</html>