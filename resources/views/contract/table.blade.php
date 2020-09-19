<table id="style-2" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Contract no.</th>
            <th>Customer Name</th>
            @auth('agent')
                <th class="text-center">Action</th>
            @endauth
            <th>Customer Email</th>
            <th>Landlord</th>
            <th>Duration</th>
            <th>Period</th>
            <th class="text-center">Payment Term</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contracts as $contract)
            <tr>
                <td><a class="text-secondary" href="{{ route('contracts.show', $contract->id) }}">{{ $contract->contract_number }}</a></td>
                <td class="user-name">{{ $contract->tenant->full_name }}</td>
                @auth('agent')
                    <td class="text-center">
                        <div class="d-flex align-items-center">
                            <a href="{{route('contracts.edit',$contract->id)}}" data-toggle="tooltip" data-placement="top" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                            </a>
                            <form action="{{route('contracts.destroy',$contract->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="dropdown-item text-secondary" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                @endauth
                <td class="user-name">{{ $contract->tenant->email }}</td>
                <td class="user-name">{{ $contract->landlord->full_name }}</td>
                <td>{{ $contract->rent_duration }}</td>
                <td>{{ $contract->period }}</td>
                <td class="text-center"><span class="text-capitalize">{{ $contract->payment_term }}</span></td>
            </tr>
        @endforeach
    </tbody>
</table>