<table id="style-2" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Contract no.</th>
            @auth('agent')
                <th class="text-center">Action</th>
            @endauth
            <th>Customer Name</th>
            <th>Customer Email</th>
            <th>Landlord</th>
            <th>Duration</th>
            <th>Period</th>
            <th>Payment Term</th>
            <th class="">Contract File</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contracts as $contract)
            <tr>
                <td>{{ $contract->contract_number }}</td>
                @auth('agent')
                    <td class="text-center">
                        <div class="dropdown custom-dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                <a class="dropdown-item" href="{{route('contracts.edit',$contract->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                    <span class="ml-2">Edit</span>
                                </a>
                                <form action="{{route('contracts.destroy',$contract->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="dropdown-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> <span class="ml-2">Delete</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                @endauth
                <td class="user-name">{{ $contract->tenant->full_name }}</td>
                <td class="user-name">{{ $contract->tenant->email }}</td>
                <td class="user-name">{{ $contract->landlord->full_name }}</td>
                <td>{{ $contract->rent_duration }}</td>
                <td>{{ $contract->period }}</td>
                <td><span class="text-capitalize">{{ $contract->payment_term }}</span></td>
                <td class="text-center">
                    @if($contract->contract_file != null)
                        <a target="_blank" href="{{asset('storage/'.$contract->contract_file)}}"><span class="badge badge-success">Download</span></a>
                    @else
                        <span class="text-warning">Unavailable</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>