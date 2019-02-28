
<thead>
        <tr>
                <th>Card Provider</th>

                <th>Card Number</th>

                <th>Expiry Date</th>

                <th></th>


        </tr>
</thead>

<tbody>
        @foreach($cards as $cardInfo)
                <tr>
                    <td><b>{{ strtoupper($cardInfo->card_provider) }}</b></td>

                    <td>{{ $cardInfo->card_number }}</td>

                    <td>{{ $cardInfo->expiry_month }}/{{ $cardInfo->expiry_year }}</td>

                    <td>
                        <a href="#" class="label label-default label-mini"
                    open-dialog-url="/admin/dialogs/card/fund/{{ $cardInfo->ref_id }}" dialog-height="500" dialog-width="800"><i class="fa fa-sort"></i> Fund card</a>
                        <a href="#" delete-url="/admin/finalize/delete/card/{{ $cardInfo->ref_id }}" delete-alert="Are you sure you want to delete this card" delete-parent='tr'
                        class="label label-danger label-mini"><i class="fa fa-trash-o"></i> Delete</a>
                    </td>


                </tr>
        @endforeach
</tbody>


@if(count($cards) > 49):

<tbody>
        <tr>
                <td colspan="4">
                    <p class="text-center">

                    <button class="btn btn-primary next-view-btn"
                    href="/admin/activities/ajax/list/next/{{ strtotime($cardInfo->date_added) }}" role="button">
                    <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
                    next page</button>
                    </p>
                </td>
        </tr>

</tbody>

@endif
