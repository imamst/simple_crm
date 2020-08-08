<p>New contract has been signed with contract number <b>{{ $contract_number }}</b></p>

<p>Agent Data:</p>
<table>
    <tr>
        <td>Name</td>
        <td>:</td>
        <td>{{ $agent_name }}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>:</td>
        <td>{{ $agent_email }}</td>
    </tr>
</table>

<p>Customer Data:</p>
<table>
    <tr>
        <td>Name</td>
        <td>:</td>
        <td>{{ $tenant_first_name.' '.$tenant_family_name }}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>:</td>
        <td>{{ $tenant_email }}</td>
    </tr>
</table>

<p>Please login to check more details about newly signed contract.</p>