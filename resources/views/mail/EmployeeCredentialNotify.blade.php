<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<h1>Welcome to the BSB Glaobal Network</h1>

<table>

    <tr>
        <th>Login Email :</th>
        <td>{{ $user['email'] }}</td>
    </tr>
    <tr>
        <th>Login Password :</th>
        <td>{{ $user['password'] }}</td>
    </tr>
    <tr>
        <th>Login URL :</th>
        <td><a href="{{ route('login') }}">Click to login</a></td>
    </tr>
</table>

<ul>

</ul>

  </body>
</html>
