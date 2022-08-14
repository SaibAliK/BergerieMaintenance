<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Date</th>
      <th>Logged By</th>
      <th>Reported By</th>
      <th>Unit</th>
      <th>Urgency Level</th> 
      <th>Issue Type</th>
      <th>Issue Comment</th>
      <th>Allocation To</th>
      <th>Allocation To Name</th>
      <th>Allocation Comment</th>
      <th>Closed by</th>
      <th>Closed Comment</th>
      <th>Closed Date</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($archieved as $item)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{ date('d-m-Y', strtotime($item->created_at)) ?? ''}}</td>
      <td>
        {{$item->job->loggedby->name ?? "N/A"}}
      </td>
      <td>
        {{$item->job->reported_by ?? "N/A"}}
      </td>
      <td>
        {{$item->job->unit->unit_no ?? ""}} / {{$item->job->unit->name ?? "N/A"}}
      </td>
      <td>
        {{$item->job->urgency ?? "N/A"}}
      </td>
      <td>{{$item->job->issue->name ?? "N/A"}}</td>
      <td>{{$item->job->description ?? "N/A"}}</td>
      <td>{{$item->assign_to ?? "N/A"}}</td>
      <td>
        @if($item->assign_to=="internal")
        @php
        $name="";
        $name = App\Models\InternalMaintainer::where('id',$item->selected_user_id)->first();
        @endphp
        {{$name->name ?? ''}}
        @elseif($item->assign_to=="external")
        @php
        $name="";
        $name = App\Models\ExternalMaintainer::where('id',$item->selected_user_id)->first();
        @endphp
        {{$name->name ?? ''}}
        @else
        N/A
        @endif
      </td>

      <td>{{$item->comment ?? "N/A"}}</td>
      <td>{{$item->closed_by ?? "N/A"}}</td>
      <td>{{$item->closed_comment ?? "N/A"}}</td>
      <td>{{ date('d-m-Y', strtotime($item->closed_date)) ?? ''}}</td>
    </tr>
    @endforeach
  </tbody>
</table>