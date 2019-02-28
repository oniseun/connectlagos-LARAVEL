
<thead>
        <tr>
        <th>Ref Id</th>
        
        <th>Date</th>
        
        <th>Activity</th>
        
        </tr>
</thead>
<tbody>
        @foreach($activities as $activityInfo)
        <tr>
            <td>{{ $activityInfo->ref_id }}</td>
            
            <td>{{ $activityInfo->action_date }}</td>
            
            <td>{{ $activityInfo->activity }}</td>
        
        </tr>
        @endforeach
</tbody>
        
@if(count($activities) > 49)

        <tbody>
                <tr>
                    <td colspan="3">
                        <p class="text-center">
                        
                                <button class="btn btn-primary next-view-btn"
                                href="/admin/activities/ajax/list/next/{{ strtotime($activityInfo->action_date) }}" role="button">
                                <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
                                next page
                                </button>
                        </p>
                    </td>
                </tr>
                
        </tbody>
        
@endif
        