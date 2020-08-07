Dear {{$first_name.' bin '.$family_name}},

<p>Your account have been successfully created.</p>

<p>Use login data below to access your account.</p>

<table>
    <tr>
        <td>Email</td>
        <td>:</td>
        <td>{{ $email }}</td>
    </tr>
    <tr>
        <td>Password</td>
        <td>:</td>
        <td>{{ $password }}</td>
    </tr>
</table>

<p>Please don't expose your login data to other people to prevent malicious thing happen.</p>

<a href="{{url('login/agent')}}">Click Here to Login</a>

<p>Thanks</p>

<p>Yours faithfully,</p>

{{ ucwords($landlord_name) }}