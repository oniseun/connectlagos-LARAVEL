<thead>
        <tr>
                <th>Date</th>

                <th>Amount</th>

                <th>Trans. Type</th>

                <th>Card_number</th>

                <th>Card Provider</th>

                <th>T.Ref</th>


        </tr>
</thead>

<tbody>
        @foreach($transactions as $transInfo)
        <?php
        $label_color = $transInfo->trans_type == 'credit' ? 'success' : 'danger' ;
        ?>
                <tr>
                <td>{{ $transInfo->date_created }}</td>

                <td>N {{number_format($transInfo->amount) }} </td>

                <td><span class="label label-{{ $label_color}} label-mini">{{ $transInfo->trans_type }}</span></td>

                <td>{{ $transInfo->card_number }}</td>

                <td><b>{{ strtoupper($transInfo->card_provider) }}</b></td>

                <td>#<b>{{ $transInfo->trans_ref }}</b></td>


                </tr>
        @endforeach
</tbody>

@if(count($transactions) > 49):


<tbody>
        <tr>
            <td colspan="6">
                    <p class="text-center">

                    <button class="btn btn-primary next-view-btn"
                    href="/admin/card/transactions/ajax/list/next/{{ strtotime($transInfo->date_created) }}" role="button">
                    <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
                    next page</button>
                    </p>
            </td>
        </tr>

</tbody>

@endif
